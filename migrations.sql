CREATE DATABASE IF NOT EXISTS orizon;
USE orizon;


-- Tabella: paesi
CREATE TABLE paesi (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);


-- Tabella: viaggi
CREATE TABLE viaggi (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    posti_disponibili INT NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);


-- Tabella: paese_viaggio
CREATE TABLE paese_viaggio (
    paese_id BIGINT  NOT NULL,
    viaggio_id BIGINT  NOT NULL,

    PRIMARY KEY (paese_id, viaggio_id),

    CONSTRAINT fk_paese
        FOREIGN KEY (paese_id)
        REFERENCES paesi(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_viaggio
        FOREIGN KEY (viaggio_id)
        REFERENCES viaggi(id)
        ON DELETE CASCADE
);
