# Wiki Platform

Wiki Platform is an online plateform designed to provide an efficient backend coupled with a user-friendly frontend, aiming to deliver an exceptional user experience.

## Project Overview

This system allows administrator to easily manage categories, tags, and wikis, while authors can create, edit, and delete their own content. The frontend focuses on a seamless user interface, featuring simplified registration, an effective search bar, and dynamic displays of the latest wikis and categories for easy navigation.

The primary goal is to create a space where everyone can collaborate, create, discover, and share wikis in an easy and engaging manner.

## Key Features

### Back Office

#### Category Management (Admin)

- Create, modify, and delete categories for organizing content.
- Associate multiple wikis with a category.

#### Tag Management (Admin)

- Create, modify, and delete tags for improved content search and grouping.
- Associate tags with wikis for precise navigation.

#### Author Registration

- Authors can register on the platform, providing basic information such as name, email, and a secure password.

#### Wiki Management (Authors and Admins)

- Authors can create, edit, and delete their own wikis.
- Authors can associate a single category and multiple tags with their wikis for organization and search.
- Administrators can archive inappropriate wikis to maintain a safe and relevant environment.

#### Dashboard Homepage

- View statistics of entities via the dashboard.

### Front Office

#### Login and Register

- Users can create an account (Register) and log in (Login). Admins are redirected to the dashboard, while others go to the homepage.

#### Search Bar

- An AJAX-enabled search bar allows visitors to search for wikis, categories, and tags without page refresh.

#### Display of Latest Wikis

- The homepage or a dedicated section displays the latest wikis for quick access to the most recent content.

#### Display of Latest Categories

- A separate section showcases the latest created or updated categories for users to discover new themes.

#### Redirect to Single Wiki Page

- Clicking on a wiki redirects users to a dedicated page with comprehensive details such as content, associated categories, tags, and author information.

## Technologies Used

### Frontend

- HTML5, CSS Framework, JavaScript

### Backend

- PHP 8 with MVC architecture

### Database

- PDO driver

## Bonus Features

### Image Upload in PHP

- Users can upload images to enrich content.

### MVC Architecture Implementation

- Routing system based on Model-View-Controller (MVC) architecture.
- Autoload using namespaces for class organization.
