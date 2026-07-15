CREATE TABLE Autor (
    idAutor SERIAL PRIMARY KEY,
    nomeAutor VARCHAR(150) NOT NULL
);

CREATE TABLE Editora (
    idEditora SERIAL PRIMARY KEY,
    nomeEditora VARCHAR(150) NOT NULL
);

CREATE TABLE Leitor (
    idLeitor SERIAL PRIMARY KEY,
    nomeLeitor VARCHAR(100) NOT NULL,
    sobrenomeLeitor VARCHAR(100) NOT NULL,
    apelidoLeitor VARCHAR(100) NOT NULL,
    emailLeitor VARCHAR(150) NOT NULL UNIQUE,
    senhaLeitor VARCHAR(255) NOT NULL,
    datanascLeitor DATE NOT NULL,
    bioLeitor TEXT,
    fotoLeitor VARCHAR(255)
);

CREATE TABLE Livro (
    idLivro SERIAL PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    isbn VARCHAR(20),
    numeroPaginas INT,
    ano INT,
    idioma VARCHAR(50),
    capaLivro VARCHAR(255),
    idAutor INT NOT NULL,
    idEditora INT NOT NULL,

    FOREIGN KEY (idAutor)
        REFERENCES Autor(idAutor),

    FOREIGN KEY (idEditora)
        REFERENCES Editora(idEditora)
);

CREATE TABLE Resenha (
    idResenha SERIAL PRIMARY KEY,
    textoResenha TEXT NOT NULL,
    dataResenha DATE NOT NULL,
    idLeitor INT NOT NULL,
    idLivro INT NOT NULL,

    FOREIGN KEY (idLeitor)
        REFERENCES Leitor(idLeitor),

    FOREIGN KEY (idLivro)
        REFERENCES Livro(idLivro)
);

CREATE TABLE Comentario (
    idComentario SERIAL PRIMARY KEY,

    idLeitor INT NOT NULL,
    idResenha INT NOT NULL,

    comentario TEXT NOT NULL,
    dataComentario TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_comentario_leitor
        FOREIGN KEY (idLeitor)
        REFERENCES Leitor(idLeitor)
        ON DELETE CASCADE,

    CONSTRAINT fk_comentario_resenha
        FOREIGN KEY (idResenha)
        REFERENCES Resenha(idResenha)
        ON DELETE CASCADE
);

