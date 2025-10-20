# 🎮 Simple Game Dashboard panel (not done yet)

A simple web application built with native PHP to simulate a user and admin panel. 
This application allows users to upload their game screenshots, and an admin can view all the uploaded images. 
The project is designed with a modern look using Bootstrap and a glassmorphism effect.

-----

### 📸 Screenshot

*Place a screenshot of the user or admin dashboard here to provide a visual overview.*

*(Example of the user dashboard after uploading several images)*

-----

### ✅ Key Features

  - **Authentication System**: Secure login and logout process based on Sessions.
  - **Two User Roles**: **Admin** and **User** roles with different access rights.
  - **User Dashboard**:
      - A dedicated page for users after logging in.
      - Feature to upload multiple images at once.
      - Instant client-side image preview before uploading, using jQuery.
      - Displays a gallery of previously uploaded images.
  - **Admin Dashboard**:
      - A dedicated page for the admin.
      - Displays all images uploaded by all users.
  - **File Validation**: A server-side system (`upload.php`) rejects non-image files (JPG, PNG, GIF, WebP) to ensure security.
  - **Warning Messages**: Users receive a notification if an invalid file upload attempt fails.
  - **Responsive Design**: The layout adapts to various screen sizes using Bootstrap.

-----

### 🚀 Tech Stack

  - **Backend**: PHP
  - **Frontend**: HTML5, CSS3, JavaScript
  - **Frameworks & Libraries**:
      - [Bootstrap 5](https://getbootstrap.com/) - For UI components and layout.
      - [jQuery](https://jquery.com/) - For DOM manipulation and image preview.
      - [Bootstrap Icons](https://icons.getbootstrap.com/) - For icons.

-----

### 🛠️ Installation & Setup

To run this project in your local environment, follow these steps:

**Prerequisites:**

  - Ensure you have a local server environment like **XAMPP** or **WAMP** installed.

**Steps:**

1.  **Clone the Repository**

    ```bash
    git clone https://github.com/Threeguana/front-end-training.git
    ```

    Alternatively, download the ZIP file and extract it to your desired folder.

2.  **Move the Project Folder**

      - Move the entire project folder into the `htdocs` (for XAMPP) or `www` (for WAMP) directory.

3.  **Start the Local Server**

      - Open the XAMPP/WAMP Control Panel and start the **Apache** service.

4.  **Open in Browser**

      - Open your web browser and access the project via the URL:

    <!-- end list -->

    ```
    http://localhost/your-project-folder-name/
    ```

    Example: `http://localhost/game-panel/`

-----

### 🧑‍💻 How to Use

This application has two default accounts for demonstration purposes:

1.  **Admin Account**

      - **Username**: `admin`
      - **Password**: `321`
      - **Task**: Log in as the admin to view the admin dashboard, which displays all images.

2.  **User Account**

      - **Username**: `user`
      - **Password**: `123`
      - **Task**: Log in as a user and try uploading some image files. Also, try uploading a non-image file (like a `.pdf` or `.txt`) to see the warning message.

-----

### 📂 File Structure

```
.
├── uploads/              # Directory to store uploaded images
├── bootstrap/            # Bootstrap files (CSS & JS)
├── img/                  # Image assets for backgrounds, etc.
├── admin.php             # Admin dashboard page
├── index.php             # Main login page
├── login.php             # Script to process login logic
├── logout.php            # Script to process logout logic
├── upload.php            # Script to process file uploads & validation
├── user.php              # User dashboard page
├── script.js             # Custom JavaScript/jQuery code
├── style.css             # CSS for the login page
├── styleAdmin.css        # Custom CSS for the admin dashboard
├── styleUser.css         # Custom CSS for the user dashboard
└── README.md             # This File
```

### 📄 License

Copyright (c) 2025 Andini Tribuana

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
