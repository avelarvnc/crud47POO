CREATE TABLE categoria
(
	idCategoria			INT PRIMARY KEY AUTO_INCREMENT,
    nome				VARCHAR(100)
);

CREATE TABLE produto
(
	idProduto			INT PRIMARY KEY AUTO_INCREMENT,
    nome				VARCHAR(100) NOT NULL,
    valorUnitario		DECIMAL(10,2) NOT NULL,
    idCategoria			INT,
    CONSTRAINT fkProdutoCategoria FOREIGN KEY (idCategoria) REFERENCES categoria (idCategoria)
);

CREATE TABLE usuario
(
	idUsuario			INT AUTO_INCREMENT PRIMARY KEY,
    usuario				VARCHAR(100),
    senha				VARCHAR(100)
);

-- INSERT INTO produto (nome, valorUnitario, idCategoria)
-- VALUES ('Pão de Queijo', 5.99, 1), ('Misto Quente', 7.99, 1)

-- SELECT * FROM produto

-- SELECT 	P.nome AS nomeProduto, 
-- 		P.valorUnitario AS valor, 
--         C.nome AS nomeCategoria
-- FROM produto P
-- JOIN categoria C ON P.idCategoria = C.idCategoria

DELIMITER //

CREATE PROCEDURE piCategoria
(
	IN _nome		VARCHAR(100)
)
BEGIN
	INSERT INTO categoria (nome) VALUES (_nome);
END //


CALL piCategoria('Hortifruti');

DELIMITER //

CREATE PROCEDURE piProduto
(
	IN _nome		VARCHAR(100),
    IN _valor		DECIMAL(10,2),
    IN _categoria	VARCHAR(100)
)
BEGIN
	
    SET @idCategoria = (SELECT idCategoria FROM categoria WHERE nome = _categoria);
    
	INSERT INTO produto (nome, valorUnitario, idCategoria) VALUES (_nome, _valor, @idCategoria);

END //

DELIMITER //
CREATE PROCEDURE psListarProduto
(
	IN _nome		VARCHAR(100)
)
BEGIN
SELECT 
	P.idProduto,
    P.nome AS nomeProduto,
    P.valorUnitario,
    C.nome AS nomeCategoria
FROM produto P 
JOIN categoria C ON C.idCategoria = P.idCategoria
WHERE P.nome LIKE CONCAT(_nome,'%');
END //

DELIMITER //
CREATE PROCEDURE pdProduto
(
	IN 	_id		INT
)
BEGIN
	DELETE FROM produto WHERE idProduto = _id;
END //

DELIMITER //
CREATE PROCEDURE psProduto
(
	IN _id		INT
)
BEGIN
SELECT 
	P.idProduto,
    P.nome AS nomeProduto,
    P.valorUnitario,
    C.nome AS nomeCategoria
FROM produto P 
JOIN categoria C ON C.idCategoria = P.idCategoria
WHERE P.idProduto = _id;
END //

DELIMITER //
CREATE PROCEDURE puProduto
(
	IN	_id			INT,
    IN	_nome		VARCHAR(100),
    IN _valor		DECIMAL(10.2)
)
BEGIN
	UPDATE produto
    	SET nome = _nome,
        	valorUnitario = _valor
    WHERE idProduto = _id;
END //

DELIMITER //
CREATE PROCEDURE piUsuario
(
	IN	_usuario	VARCHAR(100),
    IN	_senha		VARCHAR(100)
)
BEGIN
	INSERT INTO usuario (usuario, senha) VALUES (_usuario, _senha);
END //

DELIMITER //
CREATE PROCEDURE psLoginUsuario
(
	IN	_usuario		VARCHAR(100),
    IN	_senha			VARCHAR(100)
)
BEGIN
	SELECT * FROM Usuario WHERE usuario = _usuario AND senha = _senha;
END //