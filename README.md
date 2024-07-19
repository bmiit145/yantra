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

#### Updating Permissions

Make sure to update the `PermissionSeeder` file with any new permissions you need. Then, run the following command to seed the updated permissions:

```bash
php artisan db:seed --class=PermissionSeeder
```

#### Assigning Permissions After Changes

Add new permissions to the `AssignPermissionSeeder` or the `AssignPermissions` command located in `app/Console`. Run either of the following commands to assign the updated permissions:

```bash
php artisan assign:permission
```

or

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

---

By following these steps and utilizing the provided commands, you can efficiently set up and manage the Yatra Dashboard project while maintaining a professional workflow.
