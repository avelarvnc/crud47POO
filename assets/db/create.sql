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