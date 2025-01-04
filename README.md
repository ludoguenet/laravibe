LARAVIBE - Social Network Built in 3 Hours
LARAVIBE is a simple and responsive social network built using Laravel, Inertia.js, and Vue.js. The goal of this project was to demonstrate how quickly you can create a basic social platform with these powerful tools in a short amount of time.

This project covers fundamental features such as user feeds, post creation with attachments, and basic real-time interaction.

Features
User Feeds: Users can post messages with attachments (images, etc.) and see a real-time update of new posts.
Attachment Support: Upload images or files alongside text posts.
Vue.js and Inertia.js Integration: The frontend is built using Vue.js, with Inertia.js providing seamless page transitions without full-page reloads.
Responsive Design: The platform works well on both desktop and mobile devices.
Real-Time Updates: Feeds refresh automatically as new posts are made, ensuring users always see the latest updates.
Installation
To get started with this project, follow these steps:

1. Clone the repository
bash
Copier le code
git clone https://github.com/ludoguenet/laravibe.git
cd laravibe
2. Install Dependencies
Make sure you have Composer and Node.js installed.

bash
Copier le code
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
3. Set Up the Environment
Copy the .env.example file to .env and update the environment variables as needed:

bash
Copier le code
cp .env.example .env
Update the .env file with your database and other configuration settings.

4. Generate App Key
bash
Copier le code
php artisan key:generate
5. Migrate the Database
bash
Copier le code
php artisan migrate
6. Run the Development Server
bash
Copier le code
# Start the Laravel server
php artisan serve

# Start the Vue.js development server
npm run dev
Your application should now be available at http://localhost:8000.

7. Seed the Database (Optional)
If you want to populate the database with some dummy data, you can run:

bash
Copier le code
php artisan db:seed
Code Overview
Frontend (Vue.js and Inertia.js)
The frontend of LARAVIBE uses Vue.js components powered by Inertia.js for smooth page transitions. The core features are:

Feed Component: Displays all user posts. The feed is updated in real-time when new posts are made.
CreatePost Component: A form that allows users to submit posts with or without attachments.
Attachment Handling: Upload images/files along with your posts, with proper display handling in the feed.
Backend (Laravel)
The backend is built with Laravel, using the Inertia.js adapter to render Vue.js components directly. Key points in the backend:

FeedController: Handles the creation and display of posts.
Feed Model: Represents each post, including support for attachments.
Attachment Model: Manages file uploads and stores them in the public directory.
Validation: Post content and attachments are validated before being saved.
Real-Time Functionality
Real-time updates in the feed are handled using Inertia.js. When a user creates a post, the feed automatically refreshes to show the new content.

Demo
A demo of the application can be seen in the video tutorial on how to build LARAVIBE in 5 hours:

Watch the Video Tutorial

Contributing
Contributions are welcome! If you find bugs or would like to add features, feel free to fork the repository, create a branch, and submit a pull request.

Fork the repository.
Create a new branch for your feature:
git checkout -b feature/my-feature
Commit your changes:
git commit -am 'Add new feature'
Push to the branch:
git push origin feature/my-feature
Create a new Pull Request.
License
This project is open-source and available under the MIT License.

Resources
Laravel Documentation: https://laravel.com/docs
Inertia.js Documentation: https://inertiajs.com
Vue.js Documentation: https://vuejs.org
