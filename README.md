# FAQ Management System

A modern, feature-rich FAQ Management System built with PHP, MySQL, and XAMPP. This system provides a clean dark multicolor interface for managing frequently asked questions with full CRUD (Create, Read, Update, Delete) operations.

## 🌟 Features

- ✨ **Complete CRUD Operations**: Add, view, edit, and delete FAQs
- 🎨 **Modern Dark Theme**: Beautiful dark multicolor design without gradients
- 🔍 **Search Functionality**: Search through questions and answers
- 📁 **Category Management**: Organize FAQs by categories
- 🎯 **Category Filtering**: Filter FAQs by specific categories
- 📱 **Responsive Design**: Works seamlessly on all devices
- ⚡ **Real-time Updates**: Instant feedback on all operations
- 🔒 **Secure**: Uses prepared statements and input sanitization

## 🛠️ Technologies Used

- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Server**: Apache (XAMPP)
- **Frontend**: HTML5, CSS3, JavaScript
- **Design**: Dark multicolor theme

## 📋 Prerequisites

Before you begin, ensure you have the following installed:
- XAMPP (or any PHP/MySQL environment)
- Web browser (Chrome, Firefox, Edge, etc.)
- Git (for cloning the repository)

## 🚀 Installation & Setup

### Step 1: Clone the Repository

```bash
git clone https://github.com/Sankrityayana/FAQ-Management-System.git
```

### Step 2: Move to XAMPP Directory

Copy the `FAQ-Management-System` folder to your XAMPP's `htdocs` directory:
- **Windows**: `C:\xampp\htdocs\`
- **Mac/Linux**: `/opt/lampp/htdocs/`

### Step 3: Start XAMPP

1. Open XAMPP Control Panel
2. Start **Apache** server
3. Start **MySQL** server

### Step 4: Create Database

1. Open your browser and go to `http://localhost/phpmyadmin`
2. Click on **"Import"** tab
3. Click **"Choose File"** and select `database.sql` from the **`sql`** folder
4. Click **"Go"** to import the database

**OR** manually create the database:
1. Click **"New"** in phpMyAdmin
2. Create database named: `faq_management_system`
3. Click on the database and go to **SQL** tab
4. Copy and paste the contents of `sql/database.sql`
5. Click **"Go"**

### Step 5: Configure Database Connection

Open `includes/config.php` and verify the database credentials:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'faq_management_system');
```

### Step 6: Access the Application

Open your web browser and navigate to:
```
http://localhost/FAQ-Management-System/
```

## 📁 Project Structure

```
FAQ-Management-System/
│
├── assets/
│   └── images/           # Images and icons
│
├── css/
│   └── style.css         # All styling (dark multicolor theme)
│
├── includes/
│   ├── config.php        # Database configuration
│   ├── header.php        # Reusable header component
│   └── footer.php        # Reusable footer component
│
├── sql/
│   └── database.sql      # Database schema and sample data
│
├── index.php             # Main page - displays all FAQs
├── add_faq.php          # Add new FAQ
├── edit_faq.php         # Edit existing FAQ
├── delete_faq.php       # Delete FAQ
├── .gitignore           # Git ignore file
├── LICENSE              # MIT License
└── README.md            # Project documentation
```

## 💡 Usage

### Adding a New FAQ
1. Click the **"+ Add New FAQ"** button
2. Fill in the question, answer, and category
3. Click **"💾 Save FAQ"**

### Editing an FAQ
1. Click the **"✏️ Edit"** button on any FAQ card
2. Modify the question, answer, or category
3. Click **"💾 Update FAQ"**

### Deleting an FAQ
1. Click the **"🗑️ Delete"** button on any FAQ card
2. Confirm the deletion in the popup dialog

### Searching FAQs
1. Use the search box at the top
2. Type your query and press Enter or click **"Filter"**

### Filtering by Category
1. Select a category from the dropdown menu
2. The page will automatically filter results

## 🎨 Color Scheme

The system uses a dark theme with multicolor accents:
- **Background**: Dark gray (#0d1117)
- **Cards**: Darker shade (#161b22)
- **Accents**: Red (#ff6b6b), Teal (#4ecdc4), Blue (#45b7d1), Green (#96ceb4)
- **Buttons**: Green (#238636), Blue (#1f6feb), Red (#da3633), Purple (#8957e5)

## 🔧 Customization

### Changing Colors
Edit `css/style.css` to modify the color scheme. Key variables to change:
- Background colors
- Button colors
- Border colors
- Text colors

### Adding More Features
You can extend the system by:
- Adding user authentication
- Implementing FAQ upvoting
- Adding FAQ comments
- Creating an admin panel
- Adding export to PDF functionality

## 🐛 Troubleshooting

### Database Connection Error
- Verify XAMPP MySQL is running
- Check database credentials in `includes/config.php`
- Ensure database exists in phpMyAdmin

### Page Not Found (404)
- Verify files are in the correct XAMPP directory
- Check Apache is running in XAMPP
- Ensure the URL is correct

### Styles Not Loading
- Clear browser cache
- Check `css/style.css` path in HTML files
- Verify file permissions

## 📝 Database Schema

### `faqs` Table
```sql
- id (INT, AUTO_INCREMENT, PRIMARY KEY)
- question (TEXT, NOT NULL)
- answer (TEXT, NOT NULL)
- category (VARCHAR(100), DEFAULT 'General')
- created_at (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)
- updated_at (TIMESTAMP, ON UPDATE CURRENT_TIMESTAMP)
```

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is open source and available under the MIT License.

## 👤 Author

**Sankrityayana**
- GitHub: [@Sankrityayana](https://github.com/Sankrityayana)

## 🙏 Acknowledgments

- Built with ❤️ using PHP and MySQL
- Designed for easy FAQ management
- Perfect for small to medium-sized projects

## 📞 Support

If you encounter any issues or have questions:
1. Check the Troubleshooting section
2. Open an issue on GitHub
3. Contact the repository owner

---

**Happy FAQ Managing! 📚✨**
