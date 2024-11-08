# CodeIgniter 3.1.13 with HMVC on PHP 8.2

This repository provides a ready-to-use setup for [CodeIgniter 3.1.13](https://codeigniter.com/) with the [HMVC (Hierarchical Model-View-Controller)](https://en.wikipedia.org/wiki/Model–view–controller#Hierarchical_model–view–controller) architecture pattern, fully compatible with PHP 8.2.

HMVC allows you to structure your application in a modular manner, making it easier to scale and maintain.

## Requirements

- PHP 8.2 or higher
- CodeIgniter 3.1.13
- Apache/Nginx or any other web server with PHP support
- Composer (optional, for dependency management)

## Features

- CodeIgniter 3.1.13, a powerful and lightweight PHP framework.
- HMVC pattern for better code organization and modularization.
- Support for PHP 8.2 features and optimizations.
- Out-of-the-box working example to get started with modular applications.

## Installation

### Step 1: Clone the Repository

```bash
git clone https://github.com/your-username/codeigniter-hmvc-php82.git
cd codeigniter-hmvc-php82
```

### Step 2: Install Dependencies (Optional)

If you're using Composer, run:

```bash
composer install
```

### Step 3: Setup the Application

1. Ensure your web server points to the `public` directory as the root.
2. Set up your database (if applicable) and configure it in `application/config/database.php`.
3. Modify any configurations in `application/config/config.php` (e.g., base URL, encryption keys).
4. Optionally, you can install the HMVC extension if it's not included:

```bash
composer require ignited/ignited-hmvc
```

### Step 4: Enable Modularity (HMVC)

To enable HMVC support, follow these steps:

1. In `application/config/config.php`, set the following:

    ```php
    $config['modules_locations'] = array(
        APPPATH . 'modules/'  // Ensure this points to the modules directory
    );
    ```

2. Create the `modules` directory under `application` if it doesn't exist:

    ```bash
    mkdir application/modules
    ```

3. Now, you can create modules within the `application/modules` directory. Each module should contain its own controllers, models, and views.

### Step 5: Verify PHP 8.2 Compatibility

Ensure your CodeIgniter application works with PHP 8.2. Some minor adjustments may be needed for compatibility with PHP 8.x features.

- CodeIgniter 3.1.13 should work with PHP 8.2 out of the box.
- If you encounter deprecated warnings or errors related to functions or features removed in PHP 8.2, consider applying fixes as described in the [CodeIgniter 3.x Migration Guide](https://codeigniter.com/user_guide/).

### Step 6: Access Your Application

After setting up the environment and configuring your database, you can access the application by navigating to the base URL in your browser:

```
http://localhost/your-app-name
```

## Example: Creating a Module

Here’s how to structure a basic module:

1. Inside the `application/modules` directory, create a new folder for your module (e.g., `blog`).

2. Inside the `blog` folder, create the following structure:

   ```plaintext
   blog/
   ├── controllers/
   │   └── Blog.php
   ├── models/
   │   └── Blog_model.php
   └── views/
       └── index.php
   ```

3. **Controller: `application/modules/blog/controllers/Blog.php`**

    ```php
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Blog extends MX_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('blog_model');
        }

        public function index()
        {
            $data['posts'] = $this->blog_model->get_posts();
            $this->load->view('index', $data);
        }
    }
    ```

4. **Model: `application/modules/blog/models/Blog_model.php`**

    ```php
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Blog_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

        public function get_posts()
        {
            // This is an example query, modify according to your database schema
            $query = $this->db->get('posts');
            return $query->result();
        }
    }
    ```

5. **View: `application/modules/blog/views/index.php`**

    ```php
    <h1>Blog Posts</h1>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li><?= $post->title; ?></li>
        <?php endforeach; ?>
    </ul>
    ```

Now, if you visit `http://localhost/your-app-name/blog`, it will load the blog module.

## Contributing

Feel free to fork this repository and submit pull requests if you find bugs or want to add improvements. Contributions are always welcome!

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- CodeIgniter team for the wonderful framework.
- HMVC architecture concept for enabling better application modularization.