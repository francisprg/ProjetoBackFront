-- =============================================================
-- LIAQUI — INSERTS
-- Apenas os dados (sem CREATE TABLE, sem prefixo "public.")
-- =============================================================

-- Autor
INSERT INTO autor (idautor, nomeautor) VALUES (1, 'Machado de Assis');
INSERT INTO autor (idautor, nomeautor) VALUES (2, 'George Orwell');
INSERT INTO autor (idautor, nomeautor) VALUES (3, 'J.K. Rowling');
INSERT INTO autor (idautor, nomeautor) VALUES (4, 'Antoine de Saint-Exupéry');
INSERT INTO autor (idautor, nomeautor) VALUES (5, 'Stephen King');
INSERT INTO autor (idautor, nomeautor) VALUES (6, 'Fiódor Dostoiévski');
INSERT INTO autor (idautor, nomeautor) VALUES (7, 'Sister Miriam Joseph');
INSERT INTO autor (idautor, nomeautor) VALUES (9, 'Peter Kreeft');
INSERT INTO autor (idautor, nomeautor) VALUES (10, 'Platão');
INSERT INTO autor (idautor, nomeautor) VALUES (11, 'Aristóteles');
INSERT INTO autor (idautor, nomeautor) VALUES (12, 'Friedrich Nietzsche');
INSERT INTO autor (idautor, nomeautor) VALUES (13, 'Marco Aurélio');
INSERT INTO autor (idautor, nomeautor) VALUES (14, 'Jostein Gaarder');
INSERT INTO autor (idautor, nomeautor) VALUES (15, 'Nicolau Maquiavel');
INSERT INTO autor (idautor, nomeautor) VALUES (16, 'René Descartes');
INSERT INTO autor (idautor, nomeautor) VALUES (17, 'Immanuel Kant');
INSERT INTO autor (idautor, nomeautor) VALUES (18, 'Tomás de Aquino');
INSERT INTO autor (idautor, nomeautor) VALUES (19, 'Santo Agostinho');
INSERT INTO autor (idautor, nomeautor) VALUES (20, 'Franz Kafka');
INSERT INTO autor (idautor, nomeautor) VALUES (21, 'J. R. R. Tolkien');
INSERT INTO autor (idautor, nomeautor) VALUES (22, 'C. S. Lewis');
INSERT INTO autor (idautor, nomeautor) VALUES (23, 'Albert Camus');
INSERT INTO autor (idautor, nomeautor) VALUES (24, 'Jean-Paul Sartre');
INSERT INTO autor (idautor, nomeautor) VALUES (25, 'Arthur Schopenhauer');


-- Editora
INSERT INTO editora (ideditora, nomeeditora) VALUES (1, 'Companhia das Letras');
INSERT INTO editora (ideditora, nomeeditora) VALUES (2, 'Rocco');
INSERT INTO editora (ideditora, nomeeditora) VALUES (3, 'HarperCollins');
INSERT INTO editora (ideditora, nomeeditora) VALUES (4, 'Intrínseca');
INSERT INTO editora (ideditora, nomeeditora) VALUES (5, 'Editora Record');
INSERT INTO editora (ideditora, nomeeditora) VALUES (6, 'Editora 34');
INSERT INTO editora (ideditora, nomeeditora) VALUES (7, 'É Realizações');


-- Leitor
INSERT INTO leitor (idleitor, nomeleitor, sobrenomeleitor, apelidoleitor, emailleitor, senhaleitor, datanascleitor, bioleitor, fotoleitor, admin) VALUES (23, 'Jose', 'Castro', 'castro', 'jose@gmail.com', '$2y$12$K0pfOKzGueNP7.pKmHwKnOYresof99G7.xc4jDLsC686XEfU0UKhm', '2007-02-12', NULL, '', false);
INSERT INTO leitor (idleitor, nomeleitor, sobrenomeleitor, apelidoleitor, emailleitor, senhaleitor, datanascleitor, bioleitor, fotoleitor, admin) VALUES (24, 'Amigo', 'amigo', 'amigo', 'amigo@gmail.com', '$2y$12$6hAut4Irn8scj37xOdOzc.ZPwtRtAOh6Md9DYDo7lGZgmM5IZ55Fi', '2007-02-25', NULL, '', false);
INSERT INTO leitor (idleitor, nomeleitor, sobrenomeleitor, apelidoleitor, emailleitor, senhaleitor, datanascleitor, bioleitor, fotoleitor, admin) VALUES (25, 'Carlao', 'Nobre', 'carlao', 'carlao@gmail.com', '$2y$12$EPbBDtWwVtF8w/PVWwsuPuD9cvIAdwRIwTvxcLzG.w7Q8Ej6.ShH2', '2007-02-12', NULL, 'default.webp', false);
INSERT INTO leitor (idleitor, nomeleitor, sobrenomeleitor, apelidoleitor, emailleitor, senhaleitor, datanascleitor, bioleitor, fotoleitor, admin) VALUES (22, 'Administrador', 'Administrador', 'adm', 'adm@gmail.com', '$2y$12$ik.UqSMgF/HZxRp/PYVqW.rZyGBhuFPNccyS5cp188RvtJCgG71Hm', '2008-02-12', 'Sou o adm mais foda! Quero ver peitar!', '6xPkU5RU.jpg', true);


-- Livro
INSERT INTO livro (idlivro, titulo, isbn, numeropaginas, ano, idioma, idautor, ideditora, capalivro) VALUES (12, 'Memórias do subsolo', '8573261854', 152, 2009, 'Português', 6, 6, 'Dostoiesvki.jpg');
INSERT INTO livro (idlivro, titulo, isbn, numeropaginas, ano, idioma, idautor, ideditora, capalivro) VALUES (13, 'O Trivium - As artes liberais da lógica, da gramática e da retórica', '8588062607', 320, 2015, 'Português', 7, 7, 'Trivium.jpg');
INSERT INTO livro (idlivro, titulo, isbn, numeropaginas, ano, idioma, idautor, ideditora, capalivro) VALUES (14, 'Lógica socrática: Um livro de lógica que usa o método socrático, questões platônicas e princípios aristotélicos', '8594090552', 508, 2024, 'Portugues', 9, 4, 'logicasocraticacapa.jpg');
INSERT INTO livro (idlivro, titulo, isbn, numeropaginas, ano, idioma, idautor, ideditora, capalivro) VALUES (15, 'Confissões de santo Agostinho', '8582850476', 416, 2017, 'Português', 19, 3, '91hlMYSrG7L._SY466_.jpg');
INSERT INTO livro (idlivro, titulo, isbn, numeropaginas, ano, idioma, idautor, ideditora, capalivro) VALUES (16, 'Sobre a ira / Sobre a tranquilidade da alma', '8582850069', 304, 2016, 'Português', 25, 1, '81+LpFdkyAS._SY466_.jpg');

-- Resenha
INSERT INTO resenha (idresenha, textoresenha, dataresenha, idleitor, idlivro) VALUES (35, 'Muito foda', '2026-06-23', 22, 16);
INSERT INTO resenha (idresenha, textoresenha, dataresenha, idleitor, idlivro) VALUES (36, 'Lixeira', '2026-06-27', 22, 12);
INSERT INTO resenha (idresenha, textoresenha, dataresenha, idleitor, idlivro) VALUES (37, 'Lindo de ver!', '2026-06-27', 23, 12);
INSERT INTO resenha (idresenha, textoresenha, dataresenha, idleitor, idlivro) VALUES (38, 'Grande livro, contribuiu muito para os meus aprendizados de logica!', '2026-06-27', 25, 14);
INSERT INTO resenha (idresenha, textoresenha, dataresenha, idleitor, idlivro) VALUES (41, 'POR CARIA', '2026-07-01', 22, 14);


-- Comentario
INSERT INTO comentario (idcomentario, idleitor, idresenha, comentario, datacomentario) VALUES (10, 23, 37, 'Ruim da peste!', '2026-06-27 15:31:59');
INSERT INTO comentario (idcomentario, idleitor, idresenha, comentario, datacomentario) VALUES (11, 23, 37, 'Ruim da peste!', '2026-06-27 15:32:01');
INSERT INTO comentario (idcomentario, idleitor, idresenha, comentario, datacomentario) VALUES (16, 22, 36, 'Eu sou foda', '2026-06-28 12:24:04');
INSERT INTO comentario (idcomentario, idleitor, idresenha, comentario, datacomentario) VALUES (13, 22, 38, 'Nada a ve', '2026-06-28 04:56:23');
