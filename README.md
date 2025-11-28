# SMPLFY Boilerplate Plugin

A modular, extensible WordPress boilerplate plugin designed to work alongside the Smplfy Core plugin. This structure provides clean separation of concerns using Handlers, Usecases, Entities, and a consistent architecture for adding custom functionality.

## 📌 Requirements

- WordPress 6+
- PHP 8+
- Gravity Forms (only if using GF features)
- Smplfy Core plugin (required)

## 🚀 What This Boilerplate Gives You

- A clean, structured way to add custom features.
- Automatic loading of:  
  - Handlers  
  - Usecases  
  - Entities  
  - Assets  
- Reusable architecture built on Smplfy Core, which provides:  
  - Base entity classes  
  - Shared utilities  
  - Common helper functions  

## 🔧 How the Boilerplate Works

### Main Plugin File  
**`smplfy-boilerplate.php`**

- Defines plugin constants  
- Loads the bootstrap  
- Loads custom handlers/usecases  
- Registers WordPress hooks  

This is the entry point for everything.

### Bootstrap  
**`smplfy_bootstrap.php`**

- Sets up autoloading  
- Initializes the environment  
- Loads shared functionality  
- Connects the plugin to Smplfy Core  

### Handlers  
Located in: `includes/handlers/`

Handlers are responsible for WordPress interactions, especially frontend features.

**Example: `ScrollButtonHandler.php`**

- Registers scripts/styles  
- Outputs button HTML  
- Hooks into `wp_footer`  
- Loads JS + CSS for the scroll animation  

**Handlers = things that “run” inside WordPress.”**

### Entities  
Located in: `includes/entities/`

Entities wrap and structure data.

**Example: `ExampleEntity.php`**

- Maps Gravity Forms submission fields into predictable object properties  
- Extends Smplfy Core’s `SMPLFY_BaseEntity`  

**Entities = clean objects representing data.**

### Usecases  
Located in: `includes/usecases/`

Usecases hold business logic — any multi-step process.

**Example: `ExampleUsecase.php`**

- Receives entity data  
- Sends data to remote API/webhook  
- Logs responses to `debug.log`  

**Usecases = logic that does actual work.**
