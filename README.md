# coding_challenge

# Problem statement:
Import data from a mongodb database into Drupal. The data should be imported into a new
custom Entity. As an administrator, i should be able to update mapping of this data as well.
e.g., I am migrating city name into title property right now. Should be able to map it with a new
property called city later & do a migration update. Running the update should import the city
name into the new property city(Rather than mapping it with title).

# Technical tasks:
- Create a custom Entity having the fields in mongodb collection as its properties.
- Research on how to migrate data from mongo to Drupal using
http://drupal.org/project/migrate. This might require installing php extensions, mongodb
server & getting your instance ready to connect to Mongodb.
- Create an interface to map the mongo properties with the entity properties.
- Write custom migration to move the data in the mongodb database to Drupal. Use the
mapping done in the interface above for mapping the content to be migrated.

# Deliverables:
- List of resources reviewed. Especially around mongo setup.
- Module for creating the custom entity.
- Module written on top of Migrate with the mapping interface.

# Implementation

- Create 2 custom modules : city_entity and mongo_migrate

# Module 1 : city_entity

- Module city_entity is responsible for creating custom entity as per the Mongo DB collection
- The custom entity modules make sures to generate a custom entity type in system.

# Module 2 : mongo_migrate
- The mongo_migrate module would be a custom Drupal module designed to facilitate the migration of data from a MongoDB database into Drupal.

# FINAL SOLUTION
- I have create a button which I wanted to run a Batch operation for Data Migration
- The Final solution should be a DRUSH command for migrating with arguments (My composer and DRUSH was broken - I wasn't able to move with this solution.)
