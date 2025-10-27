# Villa Amore CMS

A flexible Content Management System for the Villa Amore website, built with Laravel and Filament.

## Quick Start

### Access the Admin Panel
- **URL**: `/admin`
- **Login**: Use your existing admin credentials

### Admin Menu Structure
```
Content
  └─ Pages

Content Modules
  ├─ Sliders
  ├─ About Sections
  └─ Galleries
```

## Features

### Content Modules
The CMS includes three reusable module types that can be added to any page:

- **Sliders** - Hero sliders with multiple slides, images, titles, and CTAs
- **About Sections** - Rich text content blocks with optional buttons
- **Galleries** - Image galleries with lightbox functionality

### Page Management
- Create and manage pages with custom URLs
- Attach any combination of modules to pages
- Drag-and-drop module ordering
- SEO settings (meta titles, descriptions, keywords)
- Publish/unpublish controls

## Common Tasks

### Edit Homepage Content
1. Go to **Content → Pages**
2. Click **Home** page
3. Scroll to **Page Modules** section
4. Edit, reorder, or add modules
5. Click **Save**

### Create a New Module
1. Go to **Content Modules** → Select module type
2. Click **Create**
3. Fill in content:
   - **Sliders**: Add slides with images, titles, and buttons
   - **About Sections**: Add title and rich text content
   - **Galleries**: Upload images with alt text
4. Click **Save**

### Add Module to Any Page
1. Go to **Content → Pages** → Select page
2. Scroll to **Page Modules** section
3. Click **Add item**
4. Select module type and specific module
5. Set display order (0 = first)
6. Click **Save**

## Pre-Seeded Pages
Nine pages are ready to edit:
- Home (`/`)
- Book Your Stay (`/book`)
- Retreats (`/retreats`)
- Cooking Experiences (`/cooking`)
- Prosecco & Paint (`/prosecco`)
- Weddings & Events (`/weddings`)
- For Retreat Organizers (`/organizers`)
- About Us (`/about`)
- Contact (`/contact`)

## File Structure

### Uploaded Images
- Sliders: `storage/app/public/sliders/`
- Galleries: `storage/app/public/galleries/`

### View Templates
- `resources/views/partials/modules/slider.blade.php`
- `resources/views/partials/modules/about.blade.php`
- `resources/views/partials/modules/gallery.blade.php`
- `resources/views/pages/dynamic.blade.php`

### Models
- `app/Models/Page.php`
- `app/Models/Slider.php` / `SliderSlide.php`
- `app/Models/AboutSection.php`
- `app/Models/Gallery.php` / `GalleryImage.php`
- `app/Models/PageModule.php`

## Troubleshooting

| Problem | Solution |
|---------|----------|
| Images not showing | Run: `php artisan storage:link` |
| Routes not working | Run: `php artisan route:clear` |
| Admin panel errors | Run: `php artisan optimize:clear` |
| Changes not visible | Run: `php artisan view:clear` |

### Clear All Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Re-seed Sample Data
```bash
# Seed pages
php artisan db:seed --class=PagesSeeder

# Seed sample content (slider, about, gallery)
php artisan db:seed --class=SampleContentSeeder

# Reset everything (WARNING: Deletes all data!)
php artisan migrate:fresh --seed
```

## Database Tables

| Table | Purpose |
|-------|---------|
| `pages` | All website pages |
| `page_modules` | Links pages to modules |
| `sliders` / `slider_slides` | Slider content |
| `about_sections` | About section content |
| `galleries` / `gallery_images` | Gallery content |

## Best Practices

1. **Module Organization** - Use descriptive titles (e.g., "Homepage Hero Slider")
2. **Image Optimization** - Compress images before uploading
3. **Alt Text** - Always add alt text for accessibility and SEO
4. **Module Ordering** - Lower numbers appear first (0, 1, 2...)
5. **SEO** - Fill meta descriptions (150-160 characters) for all pages

## Technical Details

### How It Works
```
Admin creates modules → Attaches to pages → Modules render in order → Visitor sees content
```

### Relationship Structure
- Pages have many PageModules (polymorphic)
- PageModules belong to Slider, AboutSection, or Gallery
- Sliders have many SliderSlides
- Galleries have many GalleryImages

### Routes
- `GET /` → Homepage (dynamic or static fallback)
- `GET /{slug}` → Dynamic page rendering

## Future Enhancement Ideas

- Convert testimonials and experience boxes to modules
- Add more module types (video, features, pricing, FAQ)
- Image lazy loading and optimization
- Module scheduling (show/hide by date)
- Multi-language support

## Support Resources

- Filament Documentation: https://filamentphp.com/docs
- Laravel Documentation: https://laravel.com/docs

---

**Status**: ✅ Production Ready  
**Version**: 1.0.0
