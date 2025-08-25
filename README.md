# Task-list-laravel

This project is a Laravel-based application built for learning and experimenting with core Laravel features such as authentication, 
CRUD operations, routing, and Blade templating. It also includes fun additions like a chat room, custom modals and a weather checker.


![admin](/todolist/assets/admin.png)

# Inviroments

This project is created in two different environments:

- macOs
  - Visual Studio Code.
  - PHP Apache with HomeBrew.
  - Sequel Ace.
  - mariadb.
 
- Windows
  - Visual Studio Code.
  - Herd.
  - DBngin.
  - TablePlus.
  - mariadb.

## Futures:

- Authentication System (login/register users).
- Posts Management
  - Users can create, edit, and delete their own posts.
  - Admin can view and manage all posts.
  - Normal users can view their own posts plus admin posts.
- Chat Room
  - Users can chat directly with the admin.
  - Messages are stored in the database and displayed in real time on the page refresh.
- Weather Checker
  - Users can search for the current weather by entering a city name.
  - Displays temperature, description, humidity, and wind speed using a weather API.
- Admin Dashboard
  - View total number of posts.
  - Breakdown of posts by user.
  - 
## Tech Stack

- Backend: Laravel 11.
- Frontend: Blade , Tailwind CSS.
- Database: MySQL / MariaDB.
- Authentication: Laravel’s built-in Auth.
- API Integration: OpenWeather API (for weather page).

# Installation
- 1 . Clone the repository.

- 2 . Install dependencies.
  - composer install
  - npm install

- 3 . Setup enviroment.

- 4 . Database setup.

#### Users
| Column     | Type          | Constraints                                         |
|------------|--------------|-----------------------------------------------------|
| id         | INT UNSIGNED | AUTO_INCREMENT PRIMARY KEY                          |
| name       | VARCHAR(255) | NOT NULL                                            |
| email      | VARCHAR(255) | UNIQUE NOT NULL                                     |
| password   | VARCHAR(255) | NOT NULL                                            |
| is_admin   | TINYINT(1)   | DEFAULT 0                                           |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP                           |
| updated_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP |

#### Posts
| Column     | Type          | Constraints                                         |
|------------|--------------|-----------------------------------------------------|
| id         | INT UNSIGNED | AUTO_INCREMENT PRIMARY KEY                          |
| title      | VARCHAR(255) | NOT NULL                                            |
| content    | TEXT         | NOT NULL                                            |
| user_id    | INT UNSIGNED | FOREIGN KEY → users(id) ON DELETE CASCADE           |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP                           |
| updated_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP |

#### Messages
| Column     | Type          | Constraints                                         |
|------------|--------------|-----------------------------------------------------|
| id         | INT UNSIGNED | AUTO_INCREMENT PRIMARY KEY                          |
| user_id    | INT UNSIGNED | FOREIGN KEY → users(id) ON DELETE CASCADE           |
| content    | TEXT         | NOT NULL                                            |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP                           |
| updated_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP |

# Screenshots

- Login page.
![login](/todolist/assets/login.png)
- Post index.
![admin](/todolist/assets/admin.png)
- Chat.
![chat](/todolist/assets/chat.png)
- Weather page.
![weather](/todolist/assets/weather.png)
- Admin Dashboard.
![dashboard](/todolist/assets/dashboard.png)

- More screenshots in /todolist/assets/

# Author 
- Developed by Valantis Siomos.

