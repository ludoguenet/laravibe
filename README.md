# LARAVIBE 🚀

A social network built in 3 hours using Laravel, Inertia.js, and Vue.js.

## Overview 🌟

LARAVIBE is a simple and responsive social network demonstrating rapid development with modern web technologies. This project showcases fundamental social platform features built in just a few hours.

## Key Features ✨

- **User Feeds**: Real-time post updates and message sharing
- **Attachment Support**: Upload and share images with posts
- **Modern Stack**: Vue.js + Inertia.js for seamless navigation
- **Responsive Design**: Works great on all devices
- **Real-Time Updates**: Instant feed refreshes

## Quick Start 🏃‍♂️

### Prerequisites

- PHP 8.x
- Composer
- Node.js & npm
- MySQL/PostgreSQL

### Installation Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/ludoguenet/laravibe.git
   cd laravibe
   ```

2. **Install Dependencies**
   ```bash
   # PHP dependencies
   composer install

   # Node.js dependencies
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   # Update .env with your database settings
   ```

4. **Application Setup**
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

5. **Start Development Servers**
   ```bash
   # Laravel server
   php artisan serve

   # Vue.js development server
   npm run dev
   ```

Visit `http://localhost:8000` to see your application!

## Architecture 🏗️

### Frontend
- Vue.js components
- Inertia.js for SPA-like navigation
- Real-time feed updates
- Attachment handling

### Backend
- Laravel controllers and models
- Inertia.js integration
- File upload management
- Data validation

## Contributing 🤝

We welcome contributions! Here's how:

1. Fork the repository
2. Create your feature branch:
   ```bash
   git checkout -b feature/amazing-feature
   ```
3. Commit your changes:
   ```bash
   git commit -m 'Add amazing feature'
   ```
4. Push to the branch:
   ```bash
   git push origin feature/amazing-feature
   ```
5. Open a Pull Request

## Resources 📚

- [Laravel Documentation](https://laravel.com/docs)
- [Inertia.js Documentation](https://inertiajs.com)
- [Vue.js Documentation](https://vuejs.org)

## License 📄

This project is open-source under the MIT License.

---

Built with ❤️ using Laravel, Inertia.js, and Vue.js