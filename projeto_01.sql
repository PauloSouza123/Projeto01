-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07/02/2025 às 14:10
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_01`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(266) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin.online`
--

INSERT INTO `tb_admin.online` (`id`, `ip`, `ultima_acao`, `token`) VALUES
(25, '::1', '2025-02-06 14:37:33', '67a4b7ea058e5'),
(26, '::1', '2025-02-06 15:15:00', '67a4fc2419ca3'),
(27, '::1', '2025-02-06 17:28:27', '67a5007602c33'),
(28, '::1', '2025-02-07 10:01:45', '67a5e7722df33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `nome`, `img`, `cargo`) VALUES
(1, 'admin', 'admin', 'Paulo A. Souza', 'paulo.jpg', 2),
(2, 'karolina', 'karolina', 'Karolina Santos', '', 1),
(6, 'giovana', 'giovana', 'giovana', 'Poots3.jpg', 1),
(7, 'visitante', 'visitante', 'visitante', 'imagem.jpg.jpg', 1),
(9, 'anajulia', 'anajulia', 'Ana Julia', 'Poots2.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `dia`) VALUES
(1, '::1', '2025-01-31 00:00:00'),
(2, '192.168.228.027', '2025-01-31 19:29:08'),
(3, '127.0.0.1', '2025-01-31 00:00:00'),
(4, '::1', '2025-02-01 00:00:00'),
(5, '::1', '2025-02-04 00:00:00'),
(6, '::1', '2025-02-04 00:00:00'),
(7, '::1', '2025-02-04 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site.config`
--

CREATE TABLE `tb_site.config` (
  `titulo` varchar(255) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `descricao1` text NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site.config`
--

INSERT INTO `tb_site.config` (`titulo`, `nome_autor`, `descricao`, `icone1`, `descricao1`, `icone2`, `descricao2`, `icone3`, `descricao3`) VALUES
('Projeto 01', 'Paulo A. Souza', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic veritatis, at incidunt fugit placeat, deserunt voluptate nam voluptatibus dignissimos corporis sequi fuga similique deleniti possimus reprehenderit earum, rerum beatae enim.Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic veritatis, at incidunt fugit placeat, deserunt voluptate nam voluptatibus dignissimos corporis sequi fuga similique deleniti possimus reprehenderit earum, rerum beatae enim.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Hic veritatis, at incidunt fugit placeat, deserunt voluptate nam voluptatibus dignissimos corporis sequi fuga similique deleniti possimus reprehenderit earum, rerum beatae enim.Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic veritatis, at incidunt fugit placeat, deserunt voluptate nam voluptatibus dignissimos corporis sequi fuga similique deleniti possimus reprehenderit earum, rerum beatae enim. Minha descrição', 'fa-brands fa-css3', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat dignissimos vel perferendis, quasi nesciunt tempore maxime libero fuga et laudantium consectetur non at reiciendis voluptas molestias aspernatur officia! Soluta, magnam?', 'fa-brands fa-html5', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat dignissimos vel perferendis, quasi nesciunt tempore maxime libero fuga et laudantium consectetur non at reiciendis voluptas molestias aspernatur officia! Soluta, magnam?', 'fa-brands fa-js', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat dignissimos vel perferendis, quasi nesciunt tempore maxime libero fuga et laudantium consectetur non at reiciendis voluptas molestias aspernatur officia! Soluta, magnam?');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site.depoimentos`
--

CREATE TABLE `tb_site.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site.depoimentos`
--

INSERT INTO `tb_site.depoimentos` (`id`, `nome`, `depoimento`, `data`, `order_id`) VALUES
(1, 'User #1 editado', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum., editado com sucesso', '10/10/2020', 5),
(2, 'User #2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris risus justo, fringilla vel convallis ut, viverra a est. Maecenas eu consequat tellus, vitae aliquam tellus. Nulla ut velit malesuada, iaculis urna id, sollicitudin lacus. Nullam eget commodo ligula. Aenean dapibus diam sapien, vitae pellentesque nibh finibus sed. Nunc sagittis, leo nec viverra tincidunt, quam ex venenatis orci, at facilisis nibh lectus vitae erat. Aenean risus neque, suscipit a dolor ut, fermentum fermentum nulla. Nam aliquam cursus lacinia. Aenean et erat vel diam scelerisque pellentesque.', '10/10/2020', 1),
(3, 'User #3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris risus justo, fringilla vel convallis ut, viverra a est. Maecenas eu consequat tellus, vitae aliquam tellus. Nulla ut velit malesuada, iaculis urna id, sollicitudin lacus. Nullam eget commodo ligula. Aenean dapibus diam sapien, vitae pellentesque nibh finibus sed. Nunc sagittis, leo nec viverra tincidunt, quam ex venenatis orci, at facilisis nibh lectus vitae erat. Aenean risus neque, suscipit a dolor ut, fermentum fermentum nulla. Nam aliquam cursus lacinia. Aenean et erat vel diam scelerisque pellentesque.', '10/10/2020', 2),
(4, 'User #4 editado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris risus justo, fringilla vel convallis ut, viverra a est. Maecenas eu consequat tellus, vitae aliquam tellus. Nulla ut velit malesuada, iaculis urna id, sollicitudin lacus. Nullam eget commodo ligula. Aenean dapibus diam sapien, vitae pellentesque nibh finibus sed. Nunc sagittis, leo nec viverra tincidunt, quam ex venenatis orci, at facilisis nibh lectus vitae erat. Aenean risus neque, suscipit a dolor ut, fermentum fermentum nulla. Nam aliquam cursus lacinia. Aenean et erat vel diam scelerisque pellentesque.', '10/10/2020', 7),
(5, 'User #5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris risus justo, fringilla vel convallis ut, viverra a est. Maecenas eu consequat tellus, vitae aliquam tellus. Nulla ut velit malesuada, iaculis urna id, sollicitudin lacus. Nullam eget commodo ligula. Aenean dapibus diam sapien, vitae pellentesque nibh finibus sed. Nunc sagittis, leo nec viverra tincidunt, quam ex venenatis orci, at facilisis nibh lectus vitae erat. Aenean risus neque, suscipit a dolor ut, fermentum fermentum nulla. Nam aliquam cursus lacinia. Aenean et erat vel diam scelerisque pellentesque.', '10/10/2020', 3),
(6, 'Lucas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris risus justo, fringilla vel convallis ut, viverra a est. Maecenas eu consequat tellus, vitae aliquam tellus. Nulla ut velit malesuada, iaculis urna id, sollicitudin lacus. Nullam eget commodo ligula. Aenean dapibus diam sapien, vitae pellentesque nibh finibus sed. Nunc sagittis, leo nec viverra tincidunt, quam ex venenatis orci, at facilisis nibh lectus vitae erat. Aenean risus neque, suscipit a dolor ut, fermentum fermentum nulla. Nam aliquam cursus lacinia. Aenean et erat vel diam scelerisque pellentesque.', '19/09/2019', 4),
(7, 'Guilherme', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris risus justo, fringilla vel convallis ut, viverra a est. Maecenas eu consequat tellus, vitae aliquam tellus. Nulla ut velit malesuada, iaculis urna id, sollicitudin lacus. Nullam eget commodo ligula. Aenean dapibus diam sapien, vitae pellentesque nibh finibus sed. Nunc sagittis, leo nec viverra tincidunt, quam ex venenatis orci, at facilisis nibh lectus vitae erat. Aenean risus neque, suscipit a dolor ut, fermentum fermentum nulla. Nam aliquam cursus lacinia. Aenean et erat vel diam scelerisque pellentesque.', '19/09/2019', 6),
(8, 'Jennifer Oliveira', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris risus justo, fringilla vel convallis ut, viverra a est. Maecenas eu consequat tellus, vitae aliquam tellus. Nulla ut velit malesuada, iaculis urna id, sollicitudin lacus. Nullam eget commodo ligula. Aenean dapibus diam sapien, vitae pellentesque nibh finibus sed. Nunc sagittis, leo nec viverra tincidunt, quam ex venenatis orci, at facilisis nibh lectus vitae erat. Aenean risus neque, suscipit a dolor ut, fermentum fermentum nulla. Nam aliquam cursus lacinia. Aenean et erat vel diam scelerisque pellentesque.', '19/09/2019', 8),
(9, 'Amanda Dalarozza', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris risus justo, fringilla vel convallis ut, viverra a est. Maecenas eu consequat tellus, vitae aliquam tellus. Nulla ut velit malesuada, iaculis urna id, sollicitudin lacus. Nullam eget commodo ligula. Aenean dapibus diam sapien, vitae pellentesque nibh finibus sed. Nunc sagittis, leo nec viverra tincidunt, quam ex venenatis orci, at facilisis nibh lectus vitae erat. Aenean risus neque, suscipit a dolor ut, fermentum fermentum nulla. Nam aliquam cursus lacinia. Aenean et erat vel diam scelerisque pellentesque.', '19/09/2021', 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site.servicos`
--

CREATE TABLE `tb_site.servicos` (
  `id` int(11) NOT NULL,
  `servicos` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site.servicos`
--

INSERT INTO `tb_site.servicos` (`id`, `servicos`, `order_id`) VALUES
(1, 'Serviço editado! #2', 2),
(4, 'Serviço cadastrado! #4', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site.slides`
--

CREATE TABLE `tb_site.slides` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site.slides`
--

INSERT INTO `tb_site.slides` (`id`, `nome`, `slide`, `order_id`) VALUES
(6, 'Slide #7 editado novamente', 'slide3 (1).jpg', 0),
(7, 'Slide com WideImage', 'slide3 (1).jpg', 7),
(8, 'Slide #10', 'slide3 (1).jpg', 8);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
