CREATE TABLE users
(
    id               SERIAL PRIMARY KEY,
    firstname        VARCHAR(50)              NOT NULL,
    lastname         VARCHAR(50)              NOT NULL,
    username         VARCHAR(50) UNIQUE       NOT NULL,
    email            VARCHAR(320) UNIQUE      NOT NULL,
    password         VARCHAR(255)             NOT NULL,
    role             VARCHAR(50) DEFAULT USER NOT NULL,
    is_validated     BOOLEAN     DEFAULT false,
    is_deleted       BOOLEAN     DEFAULT false,
    activation_token VARCHAR(255) UNIQUE      NOT NULL,
    created_at       DATE        DEFAULT CURRENT_DATE
);

INSERT INTO users (firstname, lastname, username, email, password, role, is_validated, is_deleted, activation_token)
VALUES ('admin', 'admin', 'admin', 'admin@admin.com', '$2y$10$ACukkHtZ4Y6nqVGj49P9Qua259RhaN6.AXnS0RDTZqfmD8MK1RtSa', 'ADMIN', true, false, '');

CREATE TABLE templates
(
    id   SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO templates (name)
VALUES ('default'),
       ('dark'),
       ('light');

CREATE TABLE fonts
(
    id   SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    link VARCHAR(255) NOT NULL
);

INSERT INTO fonts (name, link)
VALUES ('Roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap'),
       ('Open Sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap');

CREATE TABLE global_settings
(
    id              SERIAL PRIMARY KEY,
    name            VARCHAR(255)                      NOT NULL,
    color_primary   VARCHAR(255),
    color_secondary VARCHAR(255),
    font_primary    INTEGER REFERENCES fonts (id),
    font_secondary  INTEGER REFERENCES fonts (id),
    template_id     INTEGER REFERENCES templates (id) NOT NULL
);

CREATE TABLE images
(
    id          SERIAL PRIMARY KEY,
    filename    VARCHAR(255) NOT NULL,
    description TEXT         NOT NULL,
    created_at  DATE DEFAULT CURRENT_DATE
);

CREATE TABLE home_settings
(
    id       SERIAL PRIMARY KEY,
    title    VARCHAR(255),
    content  TEXT,
    image_id INTEGER REFERENCES images (id)
);

CREATE TABLE about_settings
(
    id        SERIAL PRIMARY KEY,
    title     VARCHAR(255),
    content   TEXT,
    image1_id INTEGER REFERENCES images (id),
    image2_id INTEGER REFERENCES images (id),
    image3_id INTEGER REFERENCES images (id),
    image4_id INTEGER REFERENCES images (id)
);

CREATE TABLE projects_settings
(
    id      SERIAL PRIMARY KEY,
    title   VARCHAR(255),
    content TEXT
);

CREATE TABLE posts
(
    id            SERIAL PRIMARY KEY,
    title         VARCHAR(255),
    content       TEXT,
    url           VARCHAR(255),
    image_id      INTEGER REFERENCES images (id),
    display_order INTEGER NOT NULL,
    created_at    DATE DEFAULT CURRENT_DATE
);

CREATE TABLE projects_posts
(
    projects_config_id INTEGER REFERENCES projects_settings (id),
    post_id            INTEGER REFERENCES posts (id)
);

CREATE TABLE comments
(
    id          SERIAL PRIMARY KEY,
    user_id     INTEGER REFERENCES users (id) NOT NULL,
    post_id     INTEGER REFERENCES posts (id) NOT NULL,
    content     TEXT                          NOT NULL,
    is_approved BOOLEAN DEFAULT false,
    is_deleted  BOOLEAN DEFAULT false,
    created_at  DATE    DEFAULT CURRENT_DATE
);

CREATE TABLE contact_settings
(
    id      SERIAL PRIMARY KEY,
    title   VARCHAR(255),
    content TEXT,
    email   VARCHAR(320) NOT NULL
);