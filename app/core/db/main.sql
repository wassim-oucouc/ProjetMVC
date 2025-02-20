-- Active: 1739025144957@@127.0.0.1@5555@sokoworksxdb

CREATE TABLE Role(
                     id SERIAL PRIMARY KEY,
                     Nom VARCHAR(70),
                     description text
);


CREATE TABLE users(
                      id SERIAL PRIMARY KEY,
                      Nom varchar(60),
                      Prenom varchar(60),
                      Email varchar(60),
                      Password varchar(60),
                      Photo varchar(60),
                      Status VARCHAR(50),
                      role_id INTEGER,
                      Foreign Key (role_id) REFERENCES Role(id)
)


CREATE TABLE Messages(
                         id SERIAL PRIMARY KEY,
                         Contenu VARCHAR(250),
                         id_receiver INTEGER,
                         id_sender INTEGER,
                         Status varchar(10),
                         Foreign Key (id_receiver) REFERENCES users(id),
                         Foreign Key (id_sender) REFERENCES users(id)

);
CREATE TABLE Compétences(
                            id SERIAL PRIMARY KEY,
                            Nom VARCHAR(50)
);

CREATE TABLE Catégorie(
                          id SERIAL PRIMARY KEY,
                          Nom VARCHAR(50)
);


CREATE TABLE offres(
                       id SERIAL PRIMARY KEY,
                       Title VARCHAR(60),
                       Description VARCHAR(60),
                       Budget INTEGER,
                       Photo VARCHAR(80),
                       duréé INTEGER,
                       Status VARCHAR(80),
                       id_categorie INTEGER,
                       id_client INTEGER,
                       Foreign Key (id_categorie) REFERENCES Catégorie(id),
                       Foreign Key (id_client) REFERENCES users(id)
)






CREATE TABLE Compétences_Freelancer(
                                       id SERIAL PRIMARY KEY,
                                       id_freelancer INTEGER,
                                       id_compétences INTEGER,
                                       Foreign Key (id_freelancer) REFERENCES users(id),
                                       Foreign Key (id_compétences) REFERENCES users(id)

);

CREATE TABLE Evaluation(
                           id  SERIAL PRIMARY KEY,
                           Note FLOAT,
                           Commentaire VARCHAR(100),
                           DateEvaluation TIMESTAMP,
                           id_user INTEGER,
                           Foreign Key (id_user) REFERENCES users(id)
)


INSERT INTO Role (Nom, description) VALUES
                                              ('Admin', 'Administrator with full access to the system'),
                                              ('Client', 'User who posts projects and hires freelancers'),
                                              ('Freelancer', 'User who applies for projects and completes tasks'),
                                              ('Moderator', 'User responsible for managing disputes and enforcing rules'),
                                              ('Support', 'User responsible for assisting clients and freelancers');

INSERT INTO Catégorie (nom, Description) VALUES
                                            ('Web Development', 'Projects related to website and web application development'),
                                            ('Graphic Design', 'Projects related to design and visual creativity'),
                                            ('Data Science', 'Projects related to data analysis and machine learning'),
                                            ('Digital Marketing', 'Projects related to online marketing and SEO'),
                                            ('Software Engineering', 'Projects related to software development and maintenance');


INSERT INTO Projet (nom, description, category_id, status, freelancer_id, client_id) VALUES
                                                                                         ('E-commerce Website', 'Develop an e-commerce platform for online shopping', 1, 'Open', 2, 1),
                                                                                         ('Logo Design', 'Create a unique logo for a startup company', 2, 'Completed', 3, 2),
                                                                                         ('Data Analysis Dashboard', 'Build a dashboard to visualize business data', 3, 'In Progress', 4, 3),
                                                                                         ('SEO Optimization', 'Improve the SEO ranking for a blog website', 4, 'Open', 5, 4),
                                                                                         ('Mobile App Development', 'Develop a cross-platform mobile application', 5, 'Open', 6, 5);