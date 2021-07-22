
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Banco de dados: `escola1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(6) NOT NULL,
  `nome_completo` varchar(150) NOT NULL,
  `matricula` int(10) DEFAULT NULL,
  `situacao_aluno` int(1) NOT NULL,
  `Cep` int(1) NOT NULL,
  `curso` int(5) DEFAULT NULL,
  `imagem` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(6) NOT NULL,
  `nome_curso` varchar(150) NOT NULL,
  `codigo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `id` int(6) NOT NULL,
  `situacao` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`id`, `situacao`) VALUES
(1, 'ativo'),
(2, 'inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(6) NOT NULL,
  `nome_completo` varchar(150) NOT NULL,
  `endereco` varchar(300) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nivel_id` int(1) NOT NULL,
  `complemento` varchar(300) DEFAULT NULL,
  `end_numero` int(10) DEFAULT NULL,
  `telefone` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_completo`, `endereco`, `email`, `senha`, `nivel_id`, `complemento`, `end_numero`, `telefone`) VALUES
(1, 'JOAO DA SILVA1', 'RUA ETC', 'joao@joao.com', '1234', 0, '', 12, 12),
(3, 'sada', 'asd', 'a@a.com.br', '123', 1, '', 1, 3123);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso` (`curso`),
  ADD KEY `situacao` (`situacao_aluno`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `curso` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `situacao` FOREIGN KEY (`situacao_aluno`) REFERENCES `situacao` (`id`);
COMMIT;

