#INTRODUCTION :
The city_entity module in Drupal is used to create custom entity type.

- Defines Custom Entity: Creates a new content entity type named "City Entity" which holds data related to cities.
- Field Definition: Adds various fields to the "City Entity" type, such as name, latitude, longitude, description, and other metadata about a city.
- UI Forms: Provides Drupal Form API implementations to manage the custom entity. This includes add, edit, and delete operations.
- List Builder: Implements a list builder to show a list of all "City Entity" instances in the admin interface.
- Permissions: Defines custom permissions for managing "City Entity" instances.
- Migration API: Utilizes Drupal's Migrate API to facilitate the migration of city data from MongoDB to Drupal's "City Entity".
- CRUD Operations: Implements Create, Read, Update, and Delete operations for the custom entity, both programmatically and via UI.
- Routing: Provides custom routes and controllers for displaying and managing the custom entity.
- Hooks and Plugins: May use various Drupal hooks and plugins to extend or integrate with other Drupal functionalities.