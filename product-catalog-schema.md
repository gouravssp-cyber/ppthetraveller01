# Product Catalog Database Schema - Complete Guide

## Overview

This is a focused database design for the **Product Catalog** feature only, containing 9 tables to manage:

- Product information and categorization
- Product variants (SKUs with different sizes, colors, etc.)
- Product attributes (Color, Size, Material, Fit, etc.)
- Product specifications (Fabric, Care Instructions, etc.)
- Product images and media
- Brand and category management

**Total Tables: 9**

---

## Database Tables

### 1. categories

Stores product categories with hierarchical support (e.g., Men > Shirts > Casual Shirts).

```sql
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    parent_category_id INT NULL,
    slug VARCHAR(150) UNIQUE,
    description TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (parent_category_id) REFERENCES categories(category_id)
);
```

**Fields:**
- `category_id` - Unique identifier
- `category_name` - Display name (e.g., "Men's Shirts")
- `parent_category_id` - Self-reference for hierarchies (NULL for root categories)
- `slug` - URL-friendly identifier
- `description` - Category description
- `is_active` - Whether category is visible

**Example Data:**
```
Men (parent: NULL)
  └── Shirts (parent: 1)
      ├── Casual Shirts (parent: 2)
      └── Formal Shirts (parent: 2)
```

---

### 2. brands

Stores brand/manufacturer information.

```sql
CREATE TABLE brands (
    brand_id INT AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(100) NOT NULL UNIQUE,
    brand_logo VARCHAR(255),
    description TEXT,
    website_url VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**Fields:**
- `brand_id` - Unique identifier
- `brand_name` - Brand name (e.g., "Levi's", "Nike")
- `brand_logo` - Logo image URL
- `description` - Brand description
- `website_url` - Brand's website
- `is_active` - Whether brand is active

---

### 3. products

Main product table storing core product information (not variant-specific).

```sql
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE,
    description TEXT,
    category_id INT NULL,
    brand_id INT NULL,
    gender ENUM('Men', 'Women', 'Unisex', 'Kids'),
    season ENUM('Spring', 'Summer', 'Fall', 'Winter', 'All Season'),
    is_featured BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
    FOREIGN KEY (brand_id) REFERENCES brands(brand_id)
);
```

**Fields:**
- `product_id` - Unique identifier
- `product_name` - Product display name (e.g., "Classic Blue Denim Jeans")
- `slug` - URL-friendly identifier
- `description` - Product description
- `category_id` - FK to categories
- `brand_id` - FK to brands
- `gender` - Target gender (Men/Women/Unisex/Kids)
- `season` - Seasonal collection
- `is_featured` - Show on homepage/featured section
- `is_active` - Product is visible to customers

**Important:** Prices are NOT stored here. They're stored at the variant level.

---

### 4. product_attributes

Defines available attribute types for the product catalog (Color, Size, Material, Fit, etc.).

```sql
CREATE TABLE product_attributes (
    attribute_id INT AUTO_INCREMENT PRIMARY KEY,
    attribute_name VARCHAR(50) NOT NULL UNIQUE,
    attribute_type ENUM('dropdown', 'text', 'number') DEFAULT 'dropdown',
    is_required BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**Fields:**
- `attribute_id` - Unique identifier
- `attribute_name` - Attribute name (e.g., "Color", "Size", "Material")
- `attribute_type` - UI type for displaying values
- `is_required` - Whether all products must have this attribute

**Example Data:**
```
Size (attribute_id: 1, type: dropdown)
Color (attribute_id: 2, type: dropdown)
Material (attribute_id: 3, type: dropdown)
Fit (attribute_id: 4, type: dropdown)
```

---

### 5. attribute_values

Stores possible values for each attribute.

```sql
CREATE TABLE attribute_values (
    value_id INT AUTO_INCREMENT PRIMARY KEY,
    attribute_id INT NOT NULL,
    value_name VARCHAR(100) NOT NULL,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (attribute_id) REFERENCES product_attributes(attribute_id) ON DELETE CASCADE,
    UNIQUE KEY (attribute_id, value_name)
);
```

**Fields:**
- `value_id` - Unique identifier
- `attribute_id` - FK to product_attributes
- `value_name` - Value name (e.g., "Red", "XL", "Cotton")
- `display_order` - Sort order for display

**Example Data:**
```
Attribute: Color (1)
  ├── Red (value_id: 1)
  ├── Blue (value_id: 2)
  └── Black (value_id: 3)

Attribute: Size (2)
  ├── S (value_id: 4)
  ├── M (value_id: 5)
  ├── L (value_id: 6)
  └── XL (value_id: 7)
```

---

### 6. product_variants

Stores SKU-level products (actual purchasable items with specific size/color combinations).

```sql
CREATE TABLE product_variants (
    variant_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    sku VARCHAR(100) UNIQUE NOT NULL,
    barcode VARCHAR(100) UNIQUE,
    price DECIMAL(10,2) NOT NULL,
    compare_at_price DECIMAL(10,2),
    cost_price DECIMAL(10,2),
    weight DECIMAL(8,2),
    display_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);
```

**Fields:**
- `variant_id` - Unique identifier
- `product_id` - FK to products
- `sku` - Stock Keeping Unit (unique identifier for inventory)
- `barcode` - Barcode for scanning
- `price` - Selling price
- `compare_at_price` - Original price (for displaying discounts)
- `cost_price` - Cost from supplier
- `weight` - For shipping calculations
- `display_order` - Sort order when displaying variants
- `is_active` - Variant is available for purchase

**Example:**
```
Product: "Cotton T-Shirt" (product_id: 1)
  ├── Variant 1: SKU "TSHIRT-RED-M" (Red, Medium) - $19.99
  ├── Variant 2: SKU "TSHIRT-RED-L" (Red, Large) - $19.99
  ├── Variant 3: SKU "TSHIRT-BLUE-M" (Blue, Medium) - $19.99
  └── Variant 4: SKU "TSHIRT-BLUE-L" (Blue, Large) - $19.99
```

---

### 7. variant_attribute_values

Junction table linking variants to their specific attribute values (many-to-many relationship).

```sql
CREATE TABLE variant_attribute_values (
    variant_id INT NOT NULL,
    value_id INT NOT NULL,
    PRIMARY KEY (variant_id, value_id),
    FOREIGN KEY (variant_id) REFERENCES product_variants(variant_id) ON DELETE CASCADE,
    FOREIGN KEY (value_id) REFERENCES attribute_values(value_id) ON DELETE CASCADE
);
```

**Fields:**
- `variant_id` - FK to product_variants
- `value_id` - FK to attribute_values

**Example:**
```
Variant: TSHIRT-RED-M (variant_id: 1)
  ├── Links to Color: Red (value_id: 1)
  └── Links to Size: M (value_id: 5)

Variant: TSHIRT-BLUE-L (variant_id: 4)
  ├── Links to Color: Blue (value_id: 2)
  └── Links to Size: L (value_id: 6)
```

---

### 8. product_specifications

Stores additional product details like fabric composition, care instructions, fit, etc.

```sql
CREATE TABLE product_specifications (
    spec_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    spec_name VARCHAR(100) NOT NULL,
    spec_value TEXT NOT NULL,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);
```

**Fields:**
- `spec_id` - Unique identifier
- `product_id` - FK to products
- `spec_name` - Specification name (e.g., "Fabric", "Care Instructions", "Fit")
- `spec_value` - Specification value
- `display_order` - Sort order for display

**Example:**
```
Product: Cotton T-Shirt (product_id: 1)
  ├── Fabric: 100% Organic Cotton
  ├── Care Instructions: Machine wash warm, tumble dry low
  ├── Neck Style: Crew Neck
  └── Sleeve Length: Short Sleeve
```

---

### 9. product_images

Stores product and variant images.

```sql
CREATE TABLE product_images (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    variant_id INT NULL,
    image_url VARCHAR(255) NOT NULL,
    alt_text VARCHAR(255),
    image_type ENUM('main', 'gallery', 'thumbnail', '360view', 'video') DEFAULT 'gallery',
    display_order INT DEFAULT 0,
    is_primary BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    FOREIGN KEY (variant_id) REFERENCES product_variants(variant_id) ON DELETE CASCADE
);
```

**Fields:**
- `image_id` - Unique identifier
- `product_id` - FK to products
- `variant_id` - FK to product_variants (NULL if image applies to all variants)
- `image_url` - Image file path/URL
- `alt_text` - SEO alternative text
- `image_type` - Type of image (main, gallery, thumbnail, 360view, video)
- `display_order` - Sort order for display
- `is_primary` - Whether this is the main product image

**Example:**
```
Product: Cotton T-Shirt (product_id: 1)
  ├── Main Image: /images/tshirt-front.jpg (for all variants)
  ├── Gallery 1: /images/tshirt-back.jpg (for all variants)
  ├── Variant-specific: /images/tshirt-red-detail.jpg (RED only)
  └── 360 View: /images/tshirt-360.mp4 (for all variants)
```

---

## Relationships Summary

| Table 1 | Relationship | Table 2 | Notes |
|---------|--------------|---------|-------|
| categories | 1:N | categories | Self-referencing for hierarchy |
| categories | 1:N | products | Many products in one category |
| brands | 1:N | products | Many products from one brand |
| products | 1:N | product_variants | One product has many variants |
| products | 1:N | product_specifications | One product has many specs |
| products | 1:N | product_images | One product has many images |
| product_attributes | 1:N | attribute_values | One attribute has many values |
| product_variants | M:N | attribute_values | Via variant_attribute_values |
| product_variants | 1:N | product_images | Variant-specific images |

---

## SQL Complete Schema

```sql
-- Create all 9 tables with relationships and indexes

CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    parent_category_id INT NULL,
    slug VARCHAR(150) UNIQUE,
    description TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (parent_category_id) REFERENCES categories(category_id),
    INDEX idx_category_parent (parent_category_id),
    INDEX idx_category_slug (slug)
);

CREATE TABLE brands (
    brand_id INT AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(100) NOT NULL UNIQUE,
    brand_logo VARCHAR(255),
    description TEXT,
    website_url VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_brand_name (brand_name)
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE,
    description TEXT,
    category_id INT NULL,
    brand_id INT NULL,
    gender ENUM('Men', 'Women', 'Unisex', 'Kids'),
    season ENUM('Spring', 'Summer', 'Fall', 'Winter', 'All Season'),
    is_featured BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
    FOREIGN KEY (brand_id) REFERENCES brands(brand_id),
    INDEX idx_product_category (category_id),
    INDEX idx_product_brand (brand_id),
    INDEX idx_product_slug (slug),
    INDEX idx_product_active (is_active)
);

CREATE TABLE product_attributes (
    attribute_id INT AUTO_INCREMENT PRIMARY KEY,
    attribute_name VARCHAR(50) NOT NULL UNIQUE,
    attribute_type ENUM('dropdown', 'text', 'number') DEFAULT 'dropdown',
    is_required BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_attribute_name (attribute_name)
);

CREATE TABLE attribute_values (
    value_id INT AUTO_INCREMENT PRIMARY KEY,
    attribute_id INT NOT NULL,
    value_name VARCHAR(100) NOT NULL,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (attribute_id) REFERENCES product_attributes(attribute_id) ON DELETE CASCADE,
    UNIQUE KEY unique_attribute_value (attribute_id, value_name),
    INDEX idx_attribute_value (attribute_id)
);

CREATE TABLE product_variants (
    variant_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    sku VARCHAR(100) UNIQUE NOT NULL,
    barcode VARCHAR(100) UNIQUE,
    price DECIMAL(10,2) NOT NULL,
    compare_at_price DECIMAL(10,2),
    cost_price DECIMAL(10,2),
    weight DECIMAL(8,2),
    display_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    INDEX idx_variant_product (product_id),
    INDEX idx_variant_sku (sku),
    INDEX idx_variant_active (is_active)
);

CREATE TABLE variant_attribute_values (
    variant_id INT NOT NULL,
    value_id INT NOT NULL,
    PRIMARY KEY (variant_id, value_id),
    FOREIGN KEY (variant_id) REFERENCES product_variants(variant_id) ON DELETE CASCADE,
    FOREIGN KEY (value_id) REFERENCES attribute_values(value_id) ON DELETE CASCADE,
    INDEX idx_variant_attribute_value (value_id)
);

CREATE TABLE product_specifications (
    spec_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    spec_name VARCHAR(100) NOT NULL,
    spec_value TEXT NOT NULL,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    INDEX idx_product_spec (product_id)
);

CREATE TABLE product_images (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    variant_id INT NULL,
    image_url VARCHAR(255) NOT NULL,
    alt_text VARCHAR(255),
    image_type ENUM('main', 'gallery', 'thumbnail', '360view', 'video') DEFAULT 'gallery',
    display_order INT DEFAULT 0,
    is_primary BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    FOREIGN KEY (variant_id) REFERENCES product_variants(variant_id) ON DELETE CASCADE,
    INDEX idx_product_image (product_id),
    INDEX idx_variant_image (variant_id)
);
```

---

## Sample Data

```sql
-- Categories
INSERT INTO categories (category_name, parent_category_id, slug) VALUES
('Men', NULL, 'men'),
('Women', NULL, 'women'),
('Shirts', 1, 'men-shirts'),
('T-Shirts', 1, 'men-t-shirts');

-- Brands
INSERT INTO brands (brand_name, description) VALUES
('Levi''s', 'Premium Denim Brand'),
('H&M', 'Affordable Fashion');

-- Attributes
INSERT INTO product_attributes (attribute_name, attribute_type) VALUES
('Size', 'dropdown'),
('Color', 'dropdown'),
('Material', 'dropdown');

-- Attribute Values
INSERT INTO attribute_values (attribute_id, value_name, display_order) VALUES
(1, 'S', 1), (1, 'M', 2), (1, 'L', 3), (1, 'XL', 4),
(2, 'Red', 1), (2, 'Blue', 2), (2, 'Black', 3),
(3, 'Cotton', 1), (3, 'Polyester', 2);

-- Product
INSERT INTO products (product_name, slug, description, category_id, brand_id, gender) VALUES
('Cotton T-Shirt', 'cotton-tshirt', 'Comfortable 100% cotton t-shirt', 4, 2, 'Men');

-- Specifications
INSERT INTO product_specifications (product_id, spec_name, spec_value, display_order) VALUES
(1, 'Fabric', '100% Organic Cotton', 1),
(1, 'Care', 'Machine wash warm, tumble dry low', 2);

-- Variants
INSERT INTO product_variants (product_id, sku, price, compare_at_price, is_active) VALUES
(1, 'TSHIRT-RED-M', 19.99, 29.99, 1),
(1, 'TSHIRT-RED-L', 19.99, 29.99, 1),
(1, 'TSHIRT-BLUE-M', 19.99, 29.99, 1);

-- Link Variants to Attributes
INSERT INTO variant_attribute_values (variant_id, value_id) VALUES
(1, 2), (1, 5),  -- Variant 1: Size M, Color Red
(2, 3), (2, 5),  -- Variant 2: Size L, Color Red
(3, 2), (3, 6);  -- Variant 3: Size M, Color Blue

-- Images
INSERT INTO product_images (product_id, variant_id, image_url, image_type, is_primary) VALUES
(1, NULL, '/images/tshirt-main.jpg', 'main', 1),
(1, NULL, '/images/tshirt-back.jpg', 'gallery', 0),
(1, 1, '/images/tshirt-red-detail.jpg', 'gallery', 0);
```

---

## Common Queries

### Get Product with All Variants and Attributes
```sql
SELECT 
    p.product_name,
    pv.sku,
    pv.price,
    GROUP_CONCAT(CONCAT(pa.attribute_name, ': ', av.value_name) SEPARATOR ', ') as attributes
FROM products p
JOIN product_variants pv ON p.product_id = pv.product_id
JOIN variant_attribute_values vav ON pv.variant_id = vav.variant_id
JOIN attribute_values av ON vav.value_id = av.value_id
JOIN product_attributes pa ON av.attribute_id = pa.attribute_id
WHERE p.product_id = 1
GROUP BY p.product_id, pv.variant_id;
```

### Search Products by Category
```sql
SELECT p.*, b.brand_name, COUNT(pv.variant_id) as variant_count
FROM products p
LEFT JOIN brands b ON p.brand_id = b.brand_id
LEFT JOIN product_variants pv ON p.product_id = pv.product_id
WHERE p.category_id = 1 AND p.is_active = 1
GROUP BY p.product_id;
```

### Get Product with Primary Image
```sql
SELECT p.*, pi.image_url, pi.alt_text
FROM products p
LEFT JOIN product_images pi ON p.product_id = pi.product_id 
    AND pi.is_primary = 1
WHERE p.slug = 'cotton-tshirt';
```

### Find Variants by Color and Size
```sql
SELECT pv.*, p.product_name
FROM product_variants pv
JOIN products p ON pv.product_id = p.product_id
WHERE pv.variant_id IN (
    SELECT DISTINCT vav1.variant_id
    FROM variant_attribute_values vav1
    WHERE vav1.value_id IN (
        SELECT value_id FROM attribute_values 
        WHERE attribute_id = 2 AND value_name = 'Red'
    )
)
AND pv.variant_id IN (
    SELECT DISTINCT vav2.variant_id
    FROM variant_attribute_values vav2
    WHERE vav2.value_id IN (
        SELECT value_id FROM attribute_values 
        WHERE attribute_id = 1 AND value_name = 'M'
    )
);
```

---

## Laravel Models & Relationships

### Quick Setup with Artisan

```bash
php artisan make:model Category -m
php artisan make:model Brand -m
php artisan make:model Product -m
php artisan make:model ProductAttribute -m
php artisan make:model AttributeValue -m
php artisan make:model ProductVariant -m
php artisan make:model ProductSpecification -m
php artisan make:model ProductImage -m
```

### Example Model (Product.php)
```php
class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }
    
    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'product_id');
    }
    
    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class, 'product_id', 'product_id')
            ->orderBy('display_order');
    }
    
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id')
            ->orderBy('display_order');
    }
    
    public function primaryImage()
    {
        return $this->images()->where('is_primary', 1)->first();
    }
}
```

---

## Best Practices

### ✅ DO:

1. **Store prices at variant level** - Never store price in products table
2. **Use SKU for inventory** - Each SKU is unique and maps to one variant
3. **Flexible attributes** - Add new attribute types without schema changes
4. **Index foreign keys** - Always index FK and frequently queried fields
5. **Preserve consistency** - Keep display_order consistent within categories
6. **Logical grouping** - Group related specifications together

### ❌ DON'T:

1. **Don't hardcode colors/sizes** - Use the flexible attribute system
2. **Don't delete variants** - Mark as `is_active = false` instead
3. **Don't store computed values** - Calculate discounts from compare_at_price
4. **Don't ignore indexes** - Query performance depends on proper indexing
5. **Don't mix variant data** - Keep variant attributes in variant_attribute_values

---

## Scaling Considerations

### Current Capacity
- Up to millions of products
- Hundreds of attribute combinations per product
- Unlimited variant images

### Optimization Tips

1. **Caching**: Cache product catalogs in Redis
2. **Search**: Use Elasticsearch for full-text search
3. **Pagination**: Always paginate product listings
4. **Lazy Loading**: Load images separately from product queries
5. **Partitioning**: Partition products table by category if it grows very large

---

## Setup Instructions

### 1. Create Database
```sql
CREATE DATABASE clothing_catalog;
USE clothing_catalog;
```

### 2. Run All CREATE TABLE Statements
See "SQL Complete Schema" section above.

### 3. Insert Sample Data
See "Sample Data" section above.

### 4. Verify Setup
```sql
SELECT * FROM products;
SELECT * FROM product_variants;
SELECT COUNT(*) FROM attribute_values;
```

---

## Next Steps

1. **Implement in Laravel** using provided migrations and models
2. **Create API endpoints** for CRUD operations
3. **Add caching** for frequently accessed products
4. **Set up image storage** (S3, Cloudinary, or local)
5. **Implement search functionality** with Elasticsearch

---

## Summary

This Product Catalog schema provides:

✅ Flexible product variant management  
✅ Unlimited attribute combinations  
✅ Hierarchical category support  
✅ Brand management  
✅ Product specifications and details  
✅ Multiple images per product/variant  
✅ Proper indexing for performance  
✅ Easy to extend and maintain  

**Total Tables: 9**  
**Relationships: 11**  
**Indexes: 17+**
