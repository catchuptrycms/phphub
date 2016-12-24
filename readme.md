
### Basic installation

#### 1. Clone the source code

Clone source code to local:

    > Git clone https://github.com/summerblue/phphub5.git

#### 2. Configure the local Homestead environment

1). Run the following command to edit the Homestead.yaml file:

`` `Shell
Homestead edit
`` `

2). Add the corresponding changes, as follows:

`` `
Folders:
    - map: ~ / my-path / phphub5 / # Your local project directory address
      To: / home / vagrant / phphub5
Sites:
    - map: phphub5.app
      To: / home / vagrant / phphub5 / public

Databases:
    - phphub5
`` `

3) Apply the changes

Save the changes, and then execute the following commands to modify the configuration information:

`` `Shell
Homestead provision
`` `

> Note: Sometimes you need to restart to see the application. Run `homestead halt` and then` homestead up` to reboot.

#### 3. Install the extension package dependencies

    > Composer install

#### 4. Generate the configuration file

    > copy .env.example .env

#### 5. Use the install command

Inside the virtual machine:

`` `Shell
Php artisan est: install
`` `

> For more information, see ESTInstallCommand

#### 6. Configure the hosts file

Host:

    Echo "192.168.10.10 phphub5.app" | sudo tee -a / etc / hosts

### The front-end toolset is installed

If you do not want to develop front-end style, you do not need to configure the front-end toolset, you can directly skip the `` link to the entrance part of the ''.

1). Install node.js

Direct Quguan network [https://nodejs.org/en/] (http: //nodejs.org/en/) download and install the latest version.

2) Install Gulp

`` `Shell
Npm install --global gulp
`` `

3) Install Laravel Elixir

`` `Shell
Npm install
`` `

4). Direct Gulp compiler front-end content

`` `Shell
Gulp
`` `

5). Monitor changes and compile automatically

`` `Shell
Gulp watch
`` `

### Link entry

* Home Address: http: //phphub5.app/
* Administrative background: http://phphub5.app/admin

In the development environment, direct access to the background address to log on to No. 1 user.

At this point, the installation is complete.

## Description of the expansion package

Expanded Packages | One sentence description | Use cases in this project
| --- | --- | --- | --- | --- | --- | --- | --- | --- |
| [Infyomlabs / laravel-generator] (https://packagist.org/packages/infyomlabs/laravel-generator) | Laravel Code Generator | Developed by Migration, Model, and Controller are generated using this extension package. |
| [Orangehill / iseed] (https://github.com/orangehill/iseed) | Export the data in the data table as a seed | BannersTableSeeder, LinksTableSeeder, CategoriesTableSeeder, and TipsTableSeeder are generated using this extension. |
| [Barryvdh / laravel-debugbar] (https://github.com/barryvdh/laravel-debugbar) | Debugging Toolbar | Development-time-necessary debugging tools. |
| [Rap2hpoutre / laravel-logviewer] (https://github.com/rap2hpoutre/laravel-log-viewer) | Log Viewer | In a production environment, use this extension to quickly view the Log and have permission to do so. |
| [Laracasts / presenter] (https://github.com/laracasts/Presenter) | Presenter Mechanism | The following Model: User, Topic, Notification uses Presenter. |
| [League / html-to-markdown] (https://github.com/thephpleague/html-to-markdown) | Convert HTML to Markdown | Use this extension when users post and reply to posts. |
| [Erusev / parsedown] (https://github.com/erusev/parsedown) | Converting Markdown to HTML | This post is used when users post or reply to posts. |
| [Laravel / socialite] (https://github.com/laravel/socialite) | Official socialization login component | The GitHub login logic uses this extension. |
| [NauxLiu / auto-correct] (https://github.com/NauxLiu/auto-correct) | Automatically add reasonable spaces between Chinese and English, correct private capitalization | Use this extension to filter headers when posting . |
| Intervention / image] (https://github.com/Intervention/image) | Image Processing Library | This extension pack is used by the logic for picture uploads when posting and replying to posts. |
| [Zizaco / entrust] (https://github.com/Zizaco/entrust.git) | User Group Permissions System | Permissions for the entire station The system is developed based on this extension package. |
| [VentureCraft / revisionable] (https://github.com/VentureCraft/revisionable) | Logging the Model's Change Log | The following Model: User, Topic, Reply, Category, Banner logs delete logs with this extension. |
| [Mews / purifier] (https://github.com/mewebstudio/Purifier) ​​| HTML Whitelist Filter | User posting, reply to prevent XSS filtering. |
| [Oumen / sitemap] (https://github.com/RoumenDamianoff/laravel-sitemap) | Sitemap Generation Tool | This project's sitemap is generated using this extension. |
| [Spatie / laravel-backup] (https://github.com/spatie/laravel-backup) | Database backup solution | Database backup of this project is done with this extension. |
| [Summerblue / administrator] (https://github.com/summerblue/administrator) | Manage Background Solutions | Use this extension in the background of this project. |
| Simple flash messages | User Login Success, Tips After Posting Successful Use this Extension Pack Development | | [laracasts / flash] (https://packagist.org/packages/laracasts/flash)


## Customize the Artisan command list

Command | Description |
| --- | --- |
| Est: install | Installation command, only support the development environment to run, the initial installation is necessary to run. |
| Est: reinstall | Reload command, only supports development environment to run, call this command will reset the database, reset the user identity. |

## Scheduled Tasks

The scheduled tasks for this project are performed in Laravel's [Task Scheduler] (https://doc.laravel-china.org/docs/5.1/scheduling).

Command | Description | Call |
| --- | --- | --- |
| Backup: run --only-db | | Database backup, every 4 hours, belongs to [spatie / laravel-backup] (https://github.com/spatie/laravel-backup) logic | php artisan backup : Run --only-db |
| Backup: clean | | clean outdated database backup, daily 1:20 run, belonging to [spatie / laravel-backup] (https://github.com/spatie/laravel-backup) logic | php artisan backup: Clean |


## Code Generator Log

The project uses [infyomlabs / laravel-generator] (https://packagist.org/packages/infyomlabs/laravel-generator) to quickly build projects, and the purpose of these logs is documented to facilitate subsequent development.

`` `Shell

Php artisan make: scaffold Appends --schema = "content: text, topic_id: integer: unsigned: default (0): index"

Php artisan make: scaffold Attentions --schema = "topic_id: integer: unsigned: default (0): index, user_id: integer: unsigned: default (0): index"
Php artisan make: scaffold Links --schema = "title: string: i


`` `Shell

Php artisan make: scaffold Appends --schema = "content: text, topic_id: integer: unsigned: default (0): index"

Php artisan make: scaffold Attentions --schema = "topic_id: integer: unsigned: default (0): index, user_id: integer: unsigned: default (0): index"

Php artisan make: scaffold Links --schema = "title: string: index, link: string: index, cover: text: nullable"

Php artisan make: scaffold Replies --schema = "topic_id: integer: unsigned: default (0): index, user_id: integer: unsigned: default (0): index, is_block: tinyInteger: Vote_count: integer: unsigned: default (0): index, body: text, body_original: text: nullable "

Php artisan make: scaffold SiteStatuses --schema = "day: string: index, register_count: integer: unsigned: default (0), topic_count: tinyInteger: unsigned: default (0), reply_count: Image_count: integer: unsigned: default (0) "

Php artisan make: scaffold Tips --schema = "body: text: nullable"

Php artisan make: scaffold Topics --schema = "title: string: index, body: text, user_id: tinyInteger: unsigned: default (0), category_id: integer: unsigned: default (0), reply_count: integer: unsigned: default (0), view_count: integer: unsigned: default (0), vote_count: integer: unsigned: default (0), last_reply_user_id: TinyInteger: unsigned: default (0), is_wiki: tinyInteger: unsigned: default (0), is_blocked: tinyInteger: unsigned: default (0), body_original: text: nullable, excerpt: text:

Php artisan make: scaffold Topics --schema = "user_id: integer: unsigned: default (0), votable_id: integer: unsigned: default (0), votable_type: string: index, is: string: index"

Php artisan make: scaffold Users --schema = "github_id: integer: unsigned: default (0): index, github_url: string: index, email: string:

Php artisan make: scaffold Votes --schema = "user_id: integer: unsigned: default (0), votable_id: integer: unsigned: default (0), votable_type: string: index, is: string:

Php artisan make: scaffold Banners --schema = "position: string: index, order: integer: unsigned: default (0): index, image_url: string, title: string: index, description: text:

Php artisan make: scaffold NotificationMailLogs --schema = "from_user_id: integer: unsigned: default (0): index, user_id: integer: unsigned: default (0): index, type: string: index, body: text:
`` `

## License

> Sites built using PHPHub5, or modified based on PHPHub5 source code ** Must be marked with the word `Powered by PHPHub` in the footer and must be linked to` https: // laravel-china.org`. ** You must add the word `Powered by PHPHub` to each header of the page.

In compliance with the above rules, you can enjoy the equivalent of MIT agreement authorization.

Or you can contact the cj @ estgroupe.com to purchase a commercial license, the commercial license to remove the footer and the title of the 'Powered by PHPHub` words.