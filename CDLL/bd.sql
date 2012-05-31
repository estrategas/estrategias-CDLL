-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 31-05-2012 a las 13:46:29
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `caminos`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `accesos`
-- 

CREATE TABLE `accesos` (
  `id_acceso` int(2) NOT NULL auto_increment,
  `acceso_tipo` int(2) NOT NULL,
  `acceso_nombre` varchar(50) NOT NULL,
  `acceso_desc` varchar(250) NOT NULL,
  PRIMARY KEY  (`id_acceso`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `actividades`
-- 

CREATE TABLE `actividades` (
  `id_actividad` int(4) NOT NULL auto_increment,
  `act_titulo` varchar(140) NOT NULL,
  `act_fecha` date NOT NULL,
  `act_desc_corta` varchar(250) NOT NULL,
  `act_desc_larga` text NOT NULL,
  `act_img` varchar(500) NOT NULL,
  `act_video` varchar(1000) default NULL,
  `id_act_categoria` int(2) NOT NULL,
  PRIMARY KEY  (`id_actividad`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `banners`
-- 

CREATE TABLE `banners` (
  `id_banner` int(2) NOT NULL auto_increment,
  `banner_img` varchar(55) NOT NULL,
  `banner_liga` varchar(250) NOT NULL,
  `banner_target` varchar(10) NOT NULL default '_self',
  `banner_visible_home` int(1) NOT NULL,
  `banner_visible_seccion` int(1) NOT NULL,
  PRIMARY KEY  (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `banners_index`
-- 

CREATE TABLE `banners_index` (
  `id_banner_ind` int(100) NOT NULL auto_increment,
  `banner_ind_img` varchar(50) NOT NULL,
  `banner_ind_url` varchar(200) NOT NULL,
  `banner_ind_lugar` int(1) NOT NULL,
  `banner_ind_desc` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_banner_ind`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `categorias_actividades`
-- 

CREATE TABLE `categorias_actividades` (
  `id_act_categoria` int(2) NOT NULL auto_increment,
  `act_categoria` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_act_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `categorias_recomendiaciones`
-- 

CREATE TABLE `categorias_recomendiaciones` (
  `id_rec_categoria` int(2) NOT NULL auto_increment,
  `rec_categoria` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_rec_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `concursos`
-- 

CREATE TABLE `concursos` (
  `id_concurso` int(3) NOT NULL auto_increment,
  `banner` varchar(50) character set latin1 collate latin1_spanish_ci default NULL,
  `nombre` varchar(50) default NULL,
  `intro` text,
  `publicado` tinyint(1) NOT NULL default '0',
  `id_convocatoria` int(3) default NULL,
  `id_categoria` int(11) default NULL,
  PRIMARY KEY  (`id_concurso`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `concursos_categorias`
-- 

CREATE TABLE `concursos_categorias` (
  `id_categoria` int(3) NOT NULL auto_increment,
  `categoria` varchar(50) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `concursos_categorias_subcategorias`
-- 

CREATE TABLE `concursos_categorias_subcategorias` (
  `id_categoria` int(3) NOT NULL,
  `id_subcategoria` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `concursos_ebooks`
-- 

CREATE TABLE `concursos_ebooks` (
  `id_ebook` int(3) NOT NULL auto_increment,
  `id_concurso` int(3) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `id_ebook_tipo` int(2) default NULL,
  PRIMARY KEY  (`id_ebook`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `concursos_ebooks_tipos`
-- 

CREATE TABLE `concursos_ebooks_tipos` (
  `id_ebook_tipo` int(2) NOT NULL auto_increment,
  `ebook_tipo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY  (`id_ebook_tipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `concursos_fotos`
-- 

CREATE TABLE `concursos_fotos` (
  `id_foto` int(3) NOT NULL auto_increment,
  `id_concurso` int(3) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `titulo` varchar(100) default NULL,
  `descripcion` text,
  PRIMARY KEY  (`id_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `concursos_jurado`
-- 

CREATE TABLE `concursos_jurado` (
  `id_concurso` int(3) NOT NULL,
  `id_categoria` int(3) NOT NULL,
  `id_subcategoria` int(3) default NULL,
  `id_jurado` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `concursos_subcategorias`
-- 

CREATE TABLE `concursos_subcategorias` (
  `id_subcategoria` int(3) NOT NULL auto_increment,
  `subcategoria` varchar(50) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`id_subcategoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `concurso_ensayo`
-- 

CREATE TABLE `concurso_ensayo` (
  `id_concurso` int(3) NOT NULL auto_increment,
  `concurso_banner` varchar(50) default NULL,
  `concurso_nombre` varchar(50) default NULL,
  `concurso_intro` text,
  `publicado` tinyint(1) NOT NULL default '0',
  `id_convocatoria` int(3) default NULL,
  PRIMARY KEY  (`id_concurso`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `convocatorias`
-- 

CREATE TABLE `convocatorias` (
  `id_convocatoria` int(3) NOT NULL auto_increment,
  `id_categoria` int(3) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `fecha_cierre` date NOT NULL,
  `banner` varchar(50) NOT NULL,
  `contenido` text NOT NULL,
  `bases` varchar(200) NOT NULL,
  `poster` varchar(50) default NULL,
  `abierta` tinyint(1) NOT NULL,
  `id_concurso` int(3) default NULL,
  PRIMARY KEY  (`id_convocatoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `ebooks_delete`
-- 

CREATE TABLE `ebooks_delete` (
  `id_ebook` int(3) NOT NULL auto_increment,
  `id_concurso` int(3) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `ipad` varchar(100) default NULL,
  `kindle` varchar(100) default NULL,
  `pdf` varchar(100) default NULL,
  PRIMARY KEY  (`id_ebook`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `fotos_actividades`
-- 

CREATE TABLE `fotos_actividades` (
  `id_foto` int(5) NOT NULL auto_increment,
  `id_actividad` int(3) NOT NULL,
  `fot_nombre` varchar(100) NOT NULL,
  `fot_descripcion` varchar(500) default NULL,
  `fot_archivo` varchar(500) NOT NULL,
  PRIMARY KEY  (`id_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=159 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `jurado`
-- 

CREATE TABLE `jurado` (
  `id_jurado` int(3) NOT NULL auto_increment,
  `nombre` varchar(50) default NULL,
  `a_paterno` varchar(50) NOT NULL,
  `a_materno` varchar(50) default NULL,
  `detalle` varchar(150) default NULL,
  `sitio_personal` varchar(150) default NULL,
  `archivo_discurso` varchar(100) default NULL COMMENT 'archivo con el discurso que dio este juez en la entrega de premios',
  PRIMARY KEY  (`id_jurado`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `noticias`
-- 

CREATE TABLE `noticias` (
  `id_noticia` int(4) NOT NULL auto_increment,
  `not_titulo` varchar(140) NOT NULL,
  `not_fecha` date NOT NULL,
  `not_desc_corta` varchar(250) NOT NULL,
  `not_desc_larga` text NOT NULL,
  `not_url` varchar(200) default NULL,
  `not_img` varchar(50) default NULL,
  `not_home` int(1) NOT NULL,
  `not_embed` text,
  PRIMARY KEY  (`id_noticia`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `participantes`
-- 

CREATE TABLE `participantes` (
  `id_participante` int(3) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  `a_paterno` varchar(50) NOT NULL,
  `a_materno` varchar(50) default NULL,
  `sexo` varchar(2) NOT NULL,
  `pais` varchar(100) default NULL,
  `foto` varchar(50) default NULL,
  PRIMARY KEY  (`id_participante`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=277 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `premios`
-- 

CREATE TABLE `premios` (
  `id_premio` int(3) NOT NULL auto_increment,
  `premio` varchar(30) NOT NULL,
  PRIMARY KEY  (`id_premio`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `prensa`
-- 

CREATE TABLE `prensa` (
  `id_prensa` int(4) NOT NULL auto_increment,
  `pre_titulo` varchar(140) NOT NULL,
  `pre_fecha` date NOT NULL,
  `pre_desc_corta` varchar(250) NOT NULL,
  `pre_desc_larga` text NOT NULL,
  `pre_img` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_prensa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `protagonistas_fotogaleria`
-- 

CREATE TABLE `protagonistas_fotogaleria` (
  `id_prot_galeria` int(5) NOT NULL auto_increment,
  `id_prot` int(3) NOT NULL,
  `prot_foto` varchar(50) NOT NULL,
  `prot_foto_desc` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_prot_galeria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `protagonistas_libertad`
-- 

CREATE TABLE `protagonistas_libertad` (
  `id_prot` int(3) NOT NULL auto_increment,
  `prot_nombre` varchar(150) NOT NULL,
  `prot_titulo` varchar(50) NOT NULL,
  `prot_desc_corta` varchar(250) NOT NULL,
  `prot_desc_larga` text NOT NULL,
  `prot_img` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_prot`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `recomendaciones`
-- 

CREATE TABLE `recomendaciones` (
  `id_recomendacion` int(3) NOT NULL auto_increment,
  `rec_titulo` varchar(140) NOT NULL,
  `rec_fecha` date NOT NULL,
  `rec_desc_corta` varchar(500) NOT NULL,
  `rec_desc_larga` text NOT NULL,
  `rec_url` varchar(200) default NULL,
  `rec_img` varchar(50) NOT NULL,
  `id_rec_categoria` int(2) NOT NULL,
  `rec_home` int(1) NOT NULL,
  PRIMARY KEY  (`id_recomendacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `reflexiones`
-- 

CREATE TABLE `reflexiones` (
  `id_reflexion` int(4) NOT NULL auto_increment,
  `ref_titulo` varchar(140) NOT NULL,
  `ref_autor` varchar(100) NOT NULL,
  `ref_fecha` date NOT NULL,
  `ref_desc_corta` varchar(500) NOT NULL,
  `ref_desc_larga` text NOT NULL,
  `ref_url` varchar(200) default NULL,
  `ref_img` varchar(50) default NULL,
  `ref_video` varchar(250) default NULL,
  `ref_home` int(1) NOT NULL,
  PRIMARY KEY  (`id_reflexion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `registro_teatro`
-- 

CREATE TABLE `registro_teatro` (
  `id_obra` int(10) NOT NULL auto_increment,
  `id_registro` varchar(10) NOT NULL,
  `nombre_titular` varchar(150) NOT NULL,
  `email_titular` varchar(100) NOT NULL,
  `titulo_obra` varchar(200) default NULL,
  `nombre_completo_adaptado` varchar(200) default NULL,
  `nombre_integrantes` text,
  `direccion_postal` text,
  `telefono` varchar(50) default NULL,
  `embeded` text,
  `time1` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `time2` datetime default NULL,
  PRIMARY KEY  (`id_obra`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipos_trabajo`
-- 

CREATE TABLE `tipos_trabajo` (
  `id_tipo_trabajo` int(11) NOT NULL auto_increment,
  `tipo_trabajo` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_tipo_trabajo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `trabajos`
-- 

CREATE TABLE `trabajos` (
  `id_trabajo` int(3) NOT NULL auto_increment,
  `titulo` varchar(150) default NULL,
  `resumen` text,
  `archivo` varchar(250) default NULL,
  `id_tipo_trabajo` int(3) NOT NULL,
  `id_concurso` int(3) default NULL,
  `id_subcategoria` int(3) default NULL,
  `id_premio` int(3) NOT NULL,
  PRIMARY KEY  (`id_trabajo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=202 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `trabajos_participantes`
-- 

CREATE TABLE `trabajos_participantes` (
  `id_trabajo` int(3) NOT NULL,
  `id_participante` int(3) NOT NULL,
  KEY `id_participante` (`id_participante`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id_usuario` int(5) NOT NULL auto_increment,
  `acceso_tipo` int(2) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `user_namer` varchar(20) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_bloqueado` int(1) NOT NULL,
  `user_login_tiempo` timestamp NOT NULL default '0000-00-00 00:00:00',
  `user_logout_tiempo` timestamp NOT NULL default '0000-00-00 00:00:00',
  `user_pwd_cambio` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;
