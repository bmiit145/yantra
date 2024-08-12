Sure, here's a refined and professionally formatted version of your instructions for the Yatra Dashboard project:

---

## Yatra Dashboard

### Steps to Setup

1. **Update Composer Dependencies**
   ```bash
   composer update
   ```

2. **Run Database Migrations**
   ```bash
   php artisan migrate
   ```

3. **Seed the Database**
   ```bash
   php artisan db:seed
   ```

4. **Start the Development Server**
   ```bash
   php artisan serve
   ```

5. **Install Node.js Dependencies**
   ```bash
   npm install
   ```

6. **Compile Assets**
   ```bash
   npm run dev
   ```
---

### Handling Permission Changes

**Edit the Permissions Configuration:**

Add any new permissions to the `config/rolePermissions.php` file. This file serves as a centralized location for managing all application permissions.
   ```php
   <?php

   return [
       'permissions' => [
            [
                'name' => 'manage users',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'manage crm',
                'guard_name' => 'web',
            ],
            [
                'name' => 'manage lead',
                'guard_name' => 'web',
            ],
      ],
       'role_permissions' => [
           'admin' => [
               'manage users',
               'create user',
               'edit user',
               'delete user',
           ],
           'user' => [
               'manage crm',
               'manage lead',
           ],
       ],
   ];
   ```

This will reflate to the `AssignPermissionSeeder` as well as `PermissionSeeder` and the `AssignPermissions` as well as `Permission` command located in `app/Console`.

#### Updating Permissions

Make sure to update the `PermissionSeeder` file with any new permissions you need. Then, run the following command to seed the updated permissions:
1. **Using Command:**
    ```bash
    php artisan make:permissions
    ```
or

2. **Using the Seeder:**

    ```bash
    php artisan db:seed --class=PermissionSeeder
    ```


#### Assigning Permissions After Changes ( Role Management )

Run either of the following commands to assign the updated permissions:
1. **Using Command:**
 
    ```bash
   php artisan assign:rolePermissions
    ```

2. **Using the Seeder:**

   ```bash
   php artisan db:seed --class=AssignPermissionSeeder
   ```
   
---

### Additional Features

To streamline the setup process, you can run the following single command to serve the application and run the necessary processes concurrently:

```bash
npm run serve:all
```

### Required Packages

To enable concurrent running of processes, install the `concurrently` package:

```bash
npm install concurrently --save-dev
```

### Example `package.json` Script for Concurrent Processes

Make sure to add the following script to your `package.json`:

```json
"scripts": {
    "serve:all": "concurrently \"php artisan serve\" \"npm run dev\""
}
```

### Features Used
1. **Components:**
   - LogDisplay Component ```php artisan make:component LogDisplay``` that located at `app/components/LogDisplay.php` and `resources/views/components/log-display.blade.php`.
   

2. **Services:**
   - EncryptionService - `app/Services/EncryptionService.php`
   - logService - `app/Services/LogService.php` using nullable Morph in `App/Model/ChangeLog` for polymorphic relationships.


3. **Commands:**
    - AssignPermissions - `app/Console/Commands/AssignPermissions.php`  
    - Permission - `app/Console/Commands/Permission.php`
    - MakePermissions - `app/Console/Commands/MakePermissions.php`


4. **Traits:**
    - HasChangeLogs - `app/HasChangeLogs.php` by ```php artisan make:trait HasChangeLogs```


---

By following these steps and utilizing the provided commands, you can efficiently set up and manage the Yatra Dashboard project while maintaining a professional workflow.
