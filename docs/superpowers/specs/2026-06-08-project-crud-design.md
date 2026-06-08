# Project CRUD — Design Spec

**Date:** 2026-06-08
**App:** IdeaGrove v2 (Laravel 13, Filament v5)
**Status:** Approved

## Overview

Add simple CRUD management for projects in the admin panel. Projects are standalone entities (no user ownership) with minimal fields.

## Data Model

### Projects Table (new migration)

| Column        | Type         | Constraints    |
|---------------|-------------|----------------|
| id            | bigIncrements | PK             |
| name          | string(255) | NOT NULL       |
| client_name   | string(255) | NOT NULL       |
| description   | text        | NULLABLE       |
| created_at    | timestamp   | auto           |
| updated_at    | timestamp   | auto           |

### Project Model (`app/Models/Project.php`)

- `$fillable = ['name', 'client_name', 'description']`
- Default timestamp behavior
- No SoftDeletes, no user relationship

## Filament Resource

A full `ProjectResource` with List, Create, and Edit pages (generated via `make:filament-resource`).

### List Table

- **Name** — TextColumn, sortable, searchable
- **Client Name** — TextColumn, sortable, searchable
- **Description** — TextColumn (truncated), not sortable
- **Created At** — TextColumn (date), sortable

### Create/Edit Form

- **Name** — TextInput, required, max:255
- **Client Name** — TextInput, required, max:255
- **Description** — Textarea, nullable

### Navigation

- Sidebar label: "Projects"
- Icon: Heroicon::RectangleStack

## Implementation Plan

1. Create migration to add `name`, `client_name`, `description` to projects table
2. Update `Project` model with fillable attributes
3. Generate and customize `ProjectResource` with form/table
4. Create a test for the resource CRUD operations
