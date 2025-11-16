# E-Commerce Admin Panel Schema - Mind Map & Implementation Guide

## 📊 System Architecture Overview

```
┌─────────────────────────────────────────────────────────────────┐
│                    E-Commerce Admin Panel                       │
│                    (Filament 3.3 + Laravel 12)                  │
└─────────────────────────────────────────────────────────────────┘
                              │
                              ├──────────────────────────────────┐
                              │                                  │
                    ┌─────────▼─────────┐            ┌──────────▼──────────┐
                    │  Content Management │            │ Product Management │
                    └─────────┬─────────┘            └──────────┬──────────┘
                              │                                  │
                ┌─────────────┼─────────────┐        ┌──────────┼──────────┐
                │                           │        │          │          │
        ┌───────▼───────┐        ┌─────────▼──────┐ │    ┌─────▼─────┐    │
        │   Categories  │        │    Sections    │ │    │ Products │    │
        └───────┬───────┘        └─────────┬──────┘ │    └─────┬─────┘    │
                │                           │        │          │          │
                │                           │        │          │          │
                └───────────────────────────┼────────┼──────────┘          │
                                            │        │                     │
                                            │        └─────────────────────┘
                                            │
                                            │
```

## 🗂️ Database Schema Structure

### 1. Categories Table
```
categories
├── id (PK)
├── name (string, required)
├── slug (string, unique, auto-generated)
├── description (text, nullable)
├── parent_id (FK → categories.id, nullable) ⭐ Self-referential
├── is_active (boolean, default: true)
├── display_order (integer, default: 0)
├── created_at
└── updated_at

Relationships:
- parent: belongsTo(Category) - Can be null (root category)
- children: hasMany(Category) - Child categories
- products: hasMany(Product) - Products in this category
```

### 2. Sections Table
```
sections
├── id (PK)
├── section_name (string, required)
├── section_type (enum: grid|carousel|banner_carousel|banner)
├── description (text, nullable)
├── display_order (integer, default: 0)
├── is_active (boolean, default: true)
├── created_at
└── updated_at

Relationships:
- products: belongsToMany(Product) via product_section pivot
```

### 3. Products Table
```
products
├── id (PK)
├── product_id (string, unique) ⭐ Used in URL
├── product_name (string, required)
├── product_title (string, required)
├── face_image (string, nullable) - Main product image
├── category_id (FK → categories.id, nullable)
├── variants (JSON) ⭐ Dynamic variant structure
├── is_active (boolean, default: true)
├── created_at
└── updated_at

Relationships:
- category: belongsTo(Category)
- sections: belongsToMany(Section) via product_section
- seo: hasOne(ProductSeo)
```

### 4. Product Variants JSON Structure
```json
{
  "variants": [
    {
      "variant_name": "Blue",
      "images": ["path/to/image1.jpg", "path/to/image2.jpg"],
      "sizes": ["S", "M", "L", "XL"],
      "discount_price": 999,
      "original_price": 1499,
      "product_details": {
        "material_care": {
          "type": "100% Cotton",
          "wash": "Machine wash"
        },
        "specifications": {
          "sleeve_length": "Long Sleeves",
          "collar": "Spread Collar"
        }
      }
    }
  ]
}
```

### 5. Product SEO Table
```
product_seos
├── id (PK)
├── product_id (FK → products.id, unique)
├── meta_title (string, nullable, max: 60)
├── meta_description (text, nullable, max: 160)
├── meta_keywords (JSON array, nullable)
├── canonical_url (string, nullable)
├── og_title (string, nullable)
├── og_description (text, nullable)
├── og_image (string, nullable)
├── twitter_title (string, nullable)
├── twitter_description (text, nullable)
├── twitter_image (string, nullable)
├── schema_markup (text, nullable) - JSON-LD
├── created_at
└── updated_at

Relationships:
- product: belongsTo(Product)
```

### 6. Product-Section Pivot Table
```
product_section
├── id (PK)
├── product_id (FK → products.id)
├── section_id (FK → sections.id)
├── display_order (integer, default: 0)
├── created_at
└── updated_at

Unique Constraint: (product_id, section_id)
```

## 🎨 Filament Resources Implementation

### CategoryResource
**Location:** `app/Filament/Resources/CategoryResource.php`

**Features:**
- ✅ Self-referential parent category selection
- ✅ Auto-generated slug from name
- ✅ Display order management
- ✅ Active/Inactive toggle
- ✅ Hierarchical display in table
- ✅ Filters: Parent category, Active status

**Form Structure:**
```
Category Information Section
├── Name (auto-generates slug)
├── Slug (editable, unique)
├── Parent Category (searchable select)
├── Description
└── Display Order

Status Section
└── Active Toggle
```

### SectionResource
**Location:** `app/Filament/Resources/SectionResource.php`

**Features:**
- ✅ Section type selection (Grid, Carousel, Banner Carousel, Banner)
- ✅ Display order management
- ✅ Active/Inactive toggle
- ✅ Product count display
- ✅ Filters: Section type, Active status

**Form Structure:**
```
Section Information Section
├── Section Name
├── Section Type (Select: grid|carousel|banner_carousel|banner)
└── Description

Display Settings Section
├── Display Order
└── Active Toggle
```

### ProductResource
**Location:** `app/Filament/Resources/ProductResource.php`

**Features:**
- ✅ Tabbed interface for better UX
- ✅ Auto-generated product_id from name
- ✅ Dynamic variant management
- ✅ Comprehensive SEO fields
- ✅ Section assignment (Where to Show)

**Form Structure (Tabs):**

#### Tab 1: Basic Information
```
Product Details Section
├── Product Name (auto-generates product_id)
├── Product ID (editable, unique, used in URL)
├── Product Title
└── Face Image (file upload with image editor)

Category & Status Section
├── Category (searchable, with create option)
└── Active Toggle
```

#### Tab 2: Variants
```
Product Variants Section
└── Repeater (collapsible, reorderable)
    ├── Variant Name
    ├── Images (multiple file upload)
    ├── Sizes (tags input)
    └── Prices
        ├── Discount Price
        └── Original Price
```

#### Tab 3: Product Details
```
Material & Care Section
└── Repeater
    ├── Type (e.g., 100% Cotton)
    └── Wash (e.g., Machine wash)

Specifications Section
└── Repeater
    ├── Key (e.g., Sleeve Length)
    └── Value (e.g., Long Sleeves)
```

#### Tab 4: SEO
```
Meta Information Section
├── Meta Title (60 chars)
├── Meta Description (160 chars)
├── Meta Keywords (tags)
└── Canonical URL

Open Graph Section
├── OG Title
├── OG Description
└── OG Image

Twitter Card Section
├── Twitter Title
├── Twitter Description
└── Twitter Image

Schema Markup Section
└── JSON-LD Schema (textarea)
```

#### Tab 5: Where to Show
```
Section Display Section
└── CheckboxList (all sections)
    └── Bulk toggleable
```

## 🔄 Data Flow & Relationships

### Creating a Product
```
1. User fills Basic Information tab
   └── Product ID auto-generated from name
   
2. User adds Variants in Variants tab
   └── Stored as JSON in variants column
   
3. User adds Product Details
   └── Stored within variant JSON structure
   
4. User fills SEO information
   └── Saved to product_seos table (one-to-one)
   
5. User selects sections in "Where to Show"
   └── Synced to product_section pivot table
   
6. Save triggers:
   ├── Product record created
   ├── ProductSeo record created/updated
   └── Sections synced via pivot
```

### Category Hierarchy
```
Root Categories (parent_id = null)
├── Men's Clothing
│   ├── Shirts (parent: Men's Clothing)
│   ├── Pants (parent: Men's Clothing)
│   └── Accessories (parent: Men's Clothing)
└── Women's Clothing
    ├── Dresses (parent: Women's Clothing)
    └── Tops (parent: Women's Clothing)
```

## 🎯 Key Implementation Details

### 1. Auto-Generated Slugs
- **Categories:** Slug generated from name in model boot method
- **Products:** Product ID generated from product_name in model boot method
- Both can be manually overridden

### 2. Variant Structure
- Stored as JSON in `variants` column
- Dynamic structure allows flexibility
- Each variant contains:
  - Images array
  - Sizes array
  - Price information
  - Product details (Material & Care, Specifications)

### 3. SEO Management
- Separate table for SEO data (one-to-one with Product)
- Comprehensive meta tags support
- Open Graph and Twitter Card support
- JSON-LD schema markup support

### 4. Section Assignment
- Many-to-many relationship via pivot table
- Products can appear in multiple sections
- Display order per section via pivot column

## 📝 Migration Order

1. `create_categories_table` - Base table
2. `create_sections_table` - Independent table
3. `create_products_table` - Depends on categories
4. `create_product_seos_table` - Depends on products
5. `create_product_section_table` - Pivot table (depends on products & sections)

## 🚀 Usage Examples

### Creating a Category with Parent
```php
Category::create([
    'name' => 'Shirts',
    'slug' => 'shirts',
    'parent_id' => 1, // Men's Clothing
    'is_active' => true,
]);
```

### Creating a Product with Variants
```php
Product::create([
    'product_id' => 'blue-cotton-shirt',
    'product_name' => 'Blue Cotton Shirt',
    'product_title' => 'Premium Blue Cotton Shirt',
    'category_id' => 1,
    'variants' => [
        [
            'variant_name' => 'Blue',
            'images' => ['image1.jpg', 'image2.jpg'],
            'sizes' => ['S', 'M', 'L'],
            'discount_price' => 999,
            'original_price' => 1499,
            'product_details' => [
                'material_care' => [
                    'type' => '100% Cotton',
                    'wash' => 'Machine wash'
                ],
                'specifications' => [
                    'sleeve_length' => 'Long Sleeves',
                    'collar' => 'Spread Collar'
                ]
            ]
        ]
    ]
]);
```

### Assigning Product to Sections
```php
$product->sections()->sync([1, 2, 3]); // Section IDs
```

## ✅ Best Practices Implemented

1. **Modern Filament 3.3 Features:**
   - Tabs for complex forms
   - Repeaters for dynamic content
   - File uploads with image editing
   - Searchable relationships
   - Bulk actions

2. **Laravel 12 Compatibility:**
   - Uses latest Eloquent features
   - Proper type hints
   - Modern PHP 8.2+ syntax

3. **User Experience:**
   - Organized tabs for complex data
   - Auto-generation of slugs/IDs
   - Helpful text and placeholders
   - Visual feedback (badges, icons)

4. **Data Integrity:**
   - Foreign key constraints
   - Unique constraints
   - Proper indexes
   - Cascade deletes where appropriate

## 🔍 Navigation Structure

```
Admin Panel
├── Content Management
│   ├── Categories
│   └── Sections
└── Product Management
    └── Products
```

## 📌 Notes

- All models use Laravel's HasFactory trait for testing
- SEO data is optional but recommended
- Products can exist without categories (nullable)
- Sections can be empty (no products required)
- Variants JSON structure is flexible and extensible

