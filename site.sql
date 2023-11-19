CREATE DATABASE cadastro CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    email VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    telefone VARCHAR(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    senha VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    tipo ENUM('editor', 'visitante') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    caminho_imagem VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    depoimento TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
);

ALTER TABLE usuarios
ADD COLUMN caminho_imagem VARCHAR(255);

use cadastro;
CREATE TABLE imagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_arquivo VARCHAR(255) NOT NULL,
    data_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

use cadastro;
ALTER TABLE usuarios
ADD COLUMN biografia TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
ADD COLUMN idade INT;

ALTER TABLE usuarios
ADD COLUMN localizacao VARCHAR(100) NOT NULL DEFAULT 'Divinopolis, Minas Gerais';

