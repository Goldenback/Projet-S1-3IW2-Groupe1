--
-- Structure de la table `users`
--
DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
    id_user SERIAL PRIMARY KEY,
    Firstname VARCHAR(50) NOT NULL,
    Lastname VARCHAR(50) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    Role VARCHAR(50) NOT NULL,
    is_validated BOOLEAN,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP DEFAULT NULL,
    token VARCHAR(255)
    );

--
-- Structure de la table `comments`
--
DROP TABLE IF EXISTS comments;
CREATE TABLE IF NOT EXISTS comments (
                                        Id_Comment SERIAL PRIMARY KEY,
                                        id_user INT NOT NULL REFERENCES users(id_user),
    comment VARCHAR(255) NOT NULL,
    is_approved BOOLEAN NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP NOT NULL
    );

--
-- Structure de la table `fonts`
--
DROP TABLE IF EXISTS fonts;
CREATE TABLE IF NOT EXISTS fonts (
                                     id_fonts SERIAL PRIMARY KEY,
                                     name VARCHAR(30) NOT NULL,
    URL VARCHAR(255) NOT NULL
    );

--
-- Structure de la table `config`
--
DROP TABLE IF EXISTS config;
CREATE TABLE IF NOT EXISTS config (
                                      Id_config SERIAL PRIMARY KEY,
                                      id_user INT REFERENCES users(id_user),
    id_primary_font INT NOT NULL REFERENCES fonts(id_fonts),
    id_secondary_font INT NOT NULL REFERENCES fonts(id_fonts),
    primary_color VARCHAR(50) DEFAULT NULL,
    secondary_color VARCHAR(50) DEFAULT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP NOT NULL
    );

--
-- Structure de la table `images`
--
DROP TABLE IF EXISTS images;
CREATE TABLE IF NOT EXISTS images (
                                      id_images SERIAL PRIMARY KEY,
                                      URL VARCHAR(255) NOT NULL,
    text VARCHAR(255) NOT NULL,
    id_user INT NOT NULL REFERENCES users(id_user)
    );

--
-- Structure de la table `pages`
--
DROP TABLE IF EXISTS pages;
CREATE TABLE IF NOT EXISTS pages (
                                     Id_pages SERIAL PRIMARY KEY,
                                     id_images INT NOT NULL REFERENCES images(id_images),
    id_config INT NOT NULL REFERENCES config(Id_config)
    );

--
-- Structure de la table `gestions`
--
DROP TABLE IF EXISTS gestions;
CREATE TABLE IF NOT EXISTS gestions (
                                        Id_config INT NOT NULL REFERENCES config(Id_config),
    Id_comments INT NOT NULL REFERENCES comments(Id_Comment)
    );

INSERT INTO fonts (name, URL) VALUES
                                  ('Lato Thin 100', 'https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap'),
                                  ('Lato Light 300', 'https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap'),
                                  ('Lato Regular 400', 'https://fonts.googleapis.com/css2?family=Lato:wght@400&display=swap');

