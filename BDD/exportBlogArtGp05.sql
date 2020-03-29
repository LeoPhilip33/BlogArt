-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 30 Mars 2020 à 01:12
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blogart20`
--

-- --------------------------------------------------------

--
-- Structure de la table `angle`
--

CREATE TABLE IF NOT EXISTS `angle` (
  `NumAngl` char(8) NOT NULL,
  `LibAngl` char(60) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumAngl`),
  KEY `ANGLE_FK` (`NumAngl`),
  KEY `FK_ASSOCIATION_6` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `angle`
--

INSERT INTO `angle` (`NumAngl`, `LibAngl`, `NumLang`) VALUES
('ANGL0101', 'Evenement', 'FRAN01'),
('ANGL0201', 'Insolite', 'FRAN01');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `NumArt` char(10) NOT NULL,
  `DtCreA` date DEFAULT NULL,
  `LibTitrA` text,
  `LibChapoA` text,
  `LibAccrochA` text,
  `Parag1A` text,
  `LibSsTitr1` text,
  `Parag2A` text,
  `LibSsTitr2` text,
  `Parag3A` text,
  `LibConclA` text,
  `UrlPhotA` char(62) DEFAULT NULL,
  `Likes` int(11) DEFAULT NULL,
  `NumAngl` char(8) NOT NULL,
  `NumThem` char(8) NOT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumArt`),
  KEY `ARTICLE_FK` (`NumArt`),
  KEY `FK_ASSOCIATION_1` (`NumAngl`),
  KEY `FK_ASSOCIATION_2` (`NumThem`),
  KEY `FK_ASSOCIATION_3` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`NumArt`, `DtCreA`, `LibTitrA`, `LibChapoA`, `LibAccrochA`, `Parag1A`, `LibSsTitr1`, `Parag2A`, `LibSsTitr2`, `Parag3A`, `LibConclA`, `UrlPhotA`, `Likes`, `NumAngl`, `NumThem`, `NumLang`) VALUES
('1', '2020-03-30', 'Le ch&acirc;teau du diable dans la r&eacute;gion bordelaise', 'Il faut savoir que de nombreux lieux renferment des secrets terrifiants dans la r&eacute;gion Bordelaise. Si tu es d&eacute;j&agrave; pass&eacute; par la rue Cours Victor Hugo &agrave; Cenon, tu as s&ucirc;rement d&eacute;j&agrave; vu un ch&acirc;teau qui t&rsquo;a interpell&eacute;, mais tu es pass&eacute; &agrave; c&ocirc;t&eacute; sans trop te poser de questions. On le nomme le Ch&acirc;teau du DIABLE !', 'Situ&eacute; sur le haut d&rsquo;une colline, cette b&acirc;tisse construite au XIXe si&egrave;cle nous cache bien des choses!', 'Situ&eacute; sur le haut d&rsquo;une colline, cette b&acirc;tisse construite au XIX&egrave;me si&egrave;cle durant l&rsquo;entre-deux-guerres a eu de nombreux r&ocirc;les dans son histoire. D&rsquo;abord, maison du maire, puis propri&eacute;t&eacute; d&rsquo;un viticulteur pour &ecirc;tre par la suite transform&eacute;e en restaurant. Comme vous l&rsquo;aurez devin&eacute;, ce ch&acirc;teau a v&eacute;cu plusieurs vies. Aujourd&rsquo;hui surnomm&eacute;e &ldquo;Ch&acirc;teau du diable&rdquo;, elle affole les habitants de la ville. De mani&egrave;re plus normale, on l&rsquo;appelle Ch&acirc;teau Voisin, Ch&acirc;teau Dorios ou De Rios, mais son nom de ch&acirc;teau &ldquo;diabolique&rdquo; ou ch&acirc;teau &ldquo;du diable&rdquo; reste le plus connu. Cette demeure est compos&eacute;e d&rsquo;un corps de logis correspondant au c&oelig;ur du ch&acirc;teau ainsi que de deux pavillons mais aussi de deux constructions individuelles &agrave; vocation secondaire. Cette derni&egrave;re abrite une grande fa&ccedil;ade avec des fen&ecirc;tres plac&eacute;s dans les combles. &Agrave; premi&egrave;re vue, il s&rsquo;agit tout simplement d&lsquo;un ch&acirc;teau sans diff&eacute;rence notoire avec d&rsquo;autres b&acirc;tisses similaires, mais m&eacute;fiez-vous des apparences comme vous pouvez vous en douter, il n&rsquo;est pas surnomm&eacute; &ldquo;ch&acirc;teau du diable&rdquo; par hasard !', 'Un ch&acirc;teau pas comme les autres', 'En effet, toutes sortes d''&eacute;v&eacute;nements &eacute;tranges avaient lieu dans cette b&acirc;tisse, bruits de cha&icirc;nes que l&rsquo;on tra&icirc;ne, pleurs, cris inhumains, ombres noires mena&ccedil;antes et m&ecirc;me des lumi&egrave;res &eacute;tranges apparaissent aupr&egrave;s des fen&ecirc;tres au cours de la nuit... Ces rumeurs qui tournent autour des pr&eacute;sences d&rsquo;esprits seraient install&eacute;s dans le b&acirc;timent depuis plusieurs dizaines d&rsquo;ann&eacute;es. L&rsquo;origine de ces esprits remonterait jusqu&rsquo;en 1938, le ch&acirc;teau &eacute;tait alors &agrave; l&rsquo;abandon. Marginaux et hors-la-loi s&rsquo;y &eacute;taient install&eacute;s ill&eacute;galement.  Les habitants, craignant de voir leurs enfants s&rsquo;approcher de ce ch&acirc;teau et  de ces hors-la-loi, ont d&eacute;cid&eacute;s d&rsquo;inventer une histoire insolite et terrifiante autour du ch&acirc;teau pour ne pas qu&rsquo;ils ne s&rsquo;y approchent. Ainsi, ils leurs ont expliqu&eacute; que le diable lui-m&ecirc;me r&eacute;sidait &agrave; l&rsquo;int&eacute;rieur et qu&rsquo;il fallait s&rsquo;&eacute;loigner un maximum de ce lieu endiabl&eacute;. Aujourd&rsquo;hui, &agrave; travers cette histoire s&rsquo;est instaur&eacute; de v&eacute;ritables croyances et inqui&eacute;tude pour les r&eacute;sidents de Cenon. Son &eacute;tat, par endroit insalubre, n&rsquo;a rien pour rassurer la population environnante : escaliers envahis par les mauvaises herbes, certains acc&egrave;s condamn&eacute;s&hellip;', 'Un lieu terrifiant qui garde ses portes ouvertes', 'A ce jour, le ch&acirc;teau n&rsquo;est pas abandonn&eacute; puisqu&rsquo;il est occup&eacute; par le Centre d&rsquo;Information et d&rsquo;Orientation de Cenon, permettant ainsi aux &eacute;tudiants et aux adultes d&rsquo;effectuer des recherches de formations. Pour les amateurs de frissons, il est possible de louer une pi&egrave;ce du ch&acirc;teau pour la somme de 270&euro; la journ&eacute;e. De nombreux spectacles &agrave; destination des enfants mais aussi aux adultes se d&eacute;roulent tout au long de l&rsquo;ann&eacute;e ou cette  salle de spectacle peut accueillir pr&egrave;s de 300 personnes, ce qui contribue &agrave; la vie de Cenon.\r\nPour terminer, si vous lecteur aimez les myst&egrave;res, de nombreuses opportunit&eacute;s s&rsquo;offrent &agrave; vous pour d&eacute;couvrir ce lieu unique, inqui&eacute;tant et vivant &agrave; la fois ! \r\nOserez-vous visiter le ch&acirc;teau du diable ?\r\nEn esp&eacute;rant que les bruits de cha&icirc;nes, les cris, les pleurs, les  ombres et lumi&egrave;res n&rsquo;apparaissent pas lorsque vous vous y rendriez ... Je vous souhaite bonne chance lors de votre visite. Pour ma part, j&rsquo;en garde encore maintenant des souvenirs terrifiants et inimaginables &hellip;', 'Comme vous l&rsquo;aurez vu, cette b&acirc;tisse &agrave; une histoire relativement intrigante, terrifiante, mais pas pour le moins fascinante. Ce genre d&rsquo;histoire est encore cont&eacute;e aujourd&rsquo;hui gr&acirc;ce &agrave; nos grands parents qui les transmettent de g&eacute;n&eacute;ration en g&eacute;n&eacute;ration &agrave; nos petits enfants. La situation actuelle du Ch&acirc;teau &eacute;tant dor&eacute;navant une salle de r&eacute;ception ou de r&eacute;union fait qu&rsquo;il est toujours possible de  visiter ce qui n&rsquo;est pas toujours le cas dans les vieilles b&acirc;tisses endiabl&eacute;s.\r\nEn parlant de diable, je vous conseille de lire un autre article se trouvant sur notre blogue qui se nomme : Le Diable et ses sorciers &agrave; Bordeaux, &ccedil;a tourne mal !', '../IlluArticles/illu_art_1.jpg', 5, 'ANGL0201', 'THE0101', 'FRAN01'),
('2', '2020-03-30', 'Comment un loup-garou a-t-il pu &ecirc;tre jug&eacute; &agrave; Bordeaux?', 'Au Moyen  &acirc;ge, la seule pens&eacute;e du loup terrifiait la population, tant son image de monstre, de b&ecirc;te f&eacute;roce &eacute;tait ancr&eacute;e dans les mentalit&eacute;s. Mais qu&rsquo;en est-il si on arrivait &agrave; en capturer un ? Un loup, mais pas seulement&hellip; Un loup-garou!', 'Imaginez-vous au d&eacute;but des ann&eacute;es 1600&hellip; Dans la campagne Bordelaise, durant la nuit, des enfants...', 'Imaginez-vous au d&eacute;but des ann&eacute;es 1600&hellip; Dans la campagne Bordelaise, durant la nuit, des enfants sont attaqu&eacute;s par une b&ecirc;te. Ils sont bless&eacute;s et certains sont m&ecirc;me enlev&eacute;s. N&eacute;anmoins, personne n&rsquo;arrive &agrave; d&eacute;crire cette b&ecirc;te. Tout de suite, on pense au loup, qui est l&rsquo;ennemi de l&rsquo;homme &agrave; cette &eacute;poque l&agrave;. On fait donc des battues afin de capturer ce loup, mais on ne trouve rien. Si bien que, les attaques se r&eacute;p&eacute;tant, on fait venir un juge, qui va mener une enqu&ecirc;te sur place. Tr&egrave;s rapidement, un adolescent de 14 ans va se pr&eacute;senter et avouer : &ldquo;C&rsquo;est moi le coupable!  J&rsquo;ai enlev&eacute; des enfants, j&rsquo;en ai attaqu&eacute;, j&rsquo;en ai tu&eacute; et j&rsquo;en ai mang&eacute;, car je suis un loup-garou!&rdquo; Il faut se remettre dans le contexte de cette &eacute;poque, on croit aux loups-garous, on croit aux sorci&egrave;res. Pour un juge, l&rsquo;occasion de capturer un monstre vivant est exceptionnel. Celui-ci va donc s&rsquo;int&eacute;resser &agrave; ce t&eacute;moignage. N&eacute;anmoins, l&rsquo;adolescent de 14 ans ne s&rsquo;exprime pas tr&egrave;s bien, il a l&rsquo;air un peu perturb&eacute; et on ne comprend pas tout ce qu&rsquo;il dit. Il peut se transformer en loup-garou uniquement lorsqu&rsquo;il voit un homme noir sur un cheval noir la nuit dans la for&ecirc;t.', 'Une expertise m&eacute;dicale digne d&rsquo;un bac+8', 'Au Moyen- ge, il se dit qu&rsquo;il faut une preuve plus claire que le jour pour condamner quelqu&rsquo;un. Le juge doit donc en trouver pour condamner le jeune homme. Que va-t-il faire pour savoir si c&rsquo;est un vrai loup-garou ? &Agrave; notre &eacute;poque, on demanderait &agrave; un psychiatre de venir et de faire une expertise psychiatrique. Et bien le juge va faire la m&ecirc;me chose. Il va demander &agrave; deux m&eacute;decins de venir afin d&rsquo;examiner son corps, le questionner et voir si ce qu&rsquo;il dit est un mensonge. Le premier m&eacute;decin va ausculter cet adolescent &agrave; la mani&egrave;re de l&rsquo;&eacute;poque. C&rsquo;est &agrave; dire qu&rsquo;il observe juste la couleur de son sang et la quantit&eacute; de poils sur le corps. Il en conclut que c&rsquo;est un vrai loup-garou. Le juge, tr&egrave;s satisfait, fait ensuite venir le deuxi&egrave;me m&eacute;decin qui examine le jeune homme de la m&ecirc;me fa&ccedil;on. Il ressort en disant : &ldquo;Non, ce n&rsquo;est pas un vrai loup-garou, c&rsquo;est juste un adolescent qui raconte n&rsquo;importe quoi&rdquo;.', 'L&rsquo;heure du proc&egrave;s : Loup-garou levez-vous !', 'La situation est fastidieuse pour le juge qui se trouve devant deux diagnostics compl&egrave;tements oppos&eacute;s. Il est donc impossible pour lui de condamner cet adolescent. Le juge prend la d&eacute;cision de se fier &agrave; son instinct et &agrave; ses croyances. En effet, si ces deux m&eacute;decins donnent deux diagnostics diff&eacute;rents c&rsquo;est donc que le diable essaie de les tromper et de prot&eacute;ger l&rsquo;adolescent. Il en conclut que c&rsquo;est un vrai loup-garou. Cette logique &ldquo;implacable&rdquo; va emmener le juge &agrave; le condamner &agrave; la pendaison et au b&ucirc;cher. Le parlement de Bordeaux annulera ensuite cette d&eacute;cision sans que l&rsquo;on sache vraiment pourquoi. L&rsquo;adolescent est enferm&eacute; dans un couvent religieux &agrave; Bordeaux pour le restant de sa vie, sans doute tr&egrave;s heureux d&rsquo;&ecirc;tre reconnu comme &ldquo;Le loup-garou de Bordeaux&rdquo;. Il demeura une b&ecirc;te de foire que les habitants se h&acirc;taient de voir pour se moquer. Ce couvent en question se nomme &ldquo;le couvent des Cordeliers&rdquo; et se situe rue de l&rsquo;Observance. Un r&eacute;cit d&rsquo;un magistrat qui est all&eacute; le voir explique que le jeune homme &eacute;tait tr&egrave;s squelettique, qu&rsquo;il ne se d&eacute;pla&ccedil;ait qu&rsquo;&agrave; quatre pattes, qu&rsquo;il hurlait comme un loup et enfin qu&rsquo;il refusait de se nourrir normalement, pr&eacute;f&eacute;rant d&eacute;vorer les ordures.', 'Cette histoire qui, soit dit en passant est vraie, met en lumi&egrave;re les probl&egrave;mes de justice du moyen &acirc;ge, ainsi que la confrontation de l&rsquo;esprit des populations avec celui de la science. Enfin, il y a lieu de remarquer, au point de vue des traditions populaires, combien la croyance du loup-garou devait &ecirc;tre fortement imprim&eacute;e dans les esprits.', '../IlluArticles/illu_art_2.jpg', 2, 'ANGL0201', 'THE0101', 'FRAN01'),
('3', '2020-03-30', 'Le Diable et ses sorciers &agrave; Bordeaux, &ccedil;a tourne mal !', 'Si tu es d&eacute;j&agrave; pass&eacute; par la rue du Colis&eacute;e &agrave; Bordeaux, tu n&rsquo;as pas pu manquer d&rsquo;&ecirc;tre interpell&eacute; par le Palais Gallien. Vieux de plus de 18 si&egrave;cles, ces ruines sont une trace de l&rsquo;histoire antique de Bordeaux. L&rsquo;&eacute;difice gallo-romain situ&eacute; au coeur de notre ville, est un marqueur du pass&eacute; que l&rsquo;on retrouve &agrave; travers diff&eacute;rentes histoires.', 'Il y a bien longtemps, au Moyen-Age, vivait Charlemagne et son &eacute;pouse, la belle Gali&egrave;ne...', 'Il y a bien longtemps, au Moyen-Age, vivait Charlemagne et son &eacute;pouse, la belle Gali&egrave;ne. Notre Bordeaux &eacute;tait une ville fortifi&eacute;e qui vivait du commerce maritime, mais c&rsquo;est pour sa beaut&eacute; et son doux climat que Charlemagne choisit notre ville pour faire construire un Palais &agrave; sa femme qu&rsquo;il aimait tant. C&rsquo;est alors que sortit de terre le Palais Gallien! C&rsquo;est cette belle histoire que racontaient, par des contes et des chansons de gestes, les Bordelais et p&egrave;lerins de Saint-Jacques.\r\nCependant, cette l&eacute;gende du temps des Carolingiens est fausse, effectivement, le Palais Gallien est bien plus vieux !  L&rsquo;&eacute;difice est un amphith&eacute;&acirc;tre gallo-romain, on ne peut imaginer y croiser princesses et courtisans.\r\nPendant l&rsquo;Antiquit&eacute;, de puissants et riches m&eacute;c&egrave;nes offraient des spectacles dans cette ar&egrave;nes pour tous les Bordelais. On y organisait des jeux, des combats de gladiateurs, des courses&hellip; ces &eacute;v&egrave;nements &eacute;tait tr&egrave;s populaires ! Le Palais Gallien accueillait 22.000 personnes qui se bousculaient pour assister aux divers spectacles. Le lieu fut ab&icirc;m&eacute; par diff&eacute;rentes invasions de cruels barbares, puis il fut mis de c&ocirc;t&eacute; au Moyen-Age, car s&eacute;par&eacute; de la ville par une muraille de pierre.', 'Des f&ecirc;tes lugubres, &acirc;mes sensibles s&rsquo;abstenir !', 'Au Moyen- ge, p&eacute;riode des romans chevaleresques o&ugrave; cohabitent magie, enchanteurs et cr&eacute;atures ensorcel&eacute;es, on raconte des histoires lugubres sur le Palais Galliens. Les ruines se trouvent au milieu des vignes et sont isol&eacute;es de la ville par une grosse muraille. Tous les samedis soirs, sorciers et sorci&egrave;res viennent se r&eacute;unir au Palais Gallien en volant sur des animaux. Les sorciers viennent renier leur foi chr&eacute;tienne et voir le diable qui pr&eacute;side le Sabbat ! Cette c&eacute;r&eacute;monie lugubre fini par un grand festin o&ugrave; l&rsquo;on sacrifie des enfants innocents, on mange leur chair et on utilise leur peau pour faire des pommades ou des potions. Les sorciers et les d&eacute;mons profite aussi de se moment pour s&rsquo;accoupler. \r\nCette r&eacute;putation d&rsquo;antre &agrave; sorci&egrave;res qui se raconte au Moyen- ge, est n&eacute;e des mauvaises fr&eacute;quentations que l&rsquo;on pouvait trouver autour du Palais Gallien. Effectivement, ces r&eacute;cits de sorcelleries ne sont pas vrais, mais on aimait les raconter car le d&eacute;cor de ruines &eacute;tait id&eacute;al pour raconter des histoires d&rsquo;horreur. Le lieu &eacute;tait peu fr&eacute;quentable &agrave; l&rsquo;&eacute;poque car plac&eacute; en p&eacute;riph&eacute;rie de la ville, situation id&eacute;ale pour un lieu de d&eacute;bauche.', 'L&eacute;gende urbaine vs r&eacute;alit&eacute;', 'Le palais Gallien est au coeur de nombreux r&eacute;cits moyen&acirc;geux sur la sorcellerie, plus fantastiques les uns que les autres. En r&eacute;alit&eacute; c&rsquo;est le lieu d&rsquo;une vraie cour des miracles o&ugrave; se donnent rendez-vous truands, charlatans et prostitu&eacute;es jusque dans les rues des alentours. On peut m&ecirc;me y voir des duels avec des taureaux et des courses de chevaux. Ces lieux, si mal fr&eacute;quent&eacute;s par filles de joies ou malfrats de toutes sortes font r&eacute;gner une d&eacute;bauche qui d&eacute;stabilise l&rsquo;Eglise. Un monast&egrave;re qui se trouve dans une rue voisine  du Palais Galliens se mit &agrave; acheter toutes les maisons des alentours pour que les moines n&rsquo;aient pas de pens&eacute;es impures, on changea m&ecirc;me le nom de la &ldquo;rue Putoye&rdquo; en &ldquo;rue Saint-Fort&rdquo;.\r\nCe lieu, si mal connu par les Bordelais qui vivaient &agrave; l&rsquo;int&eacute;rieur de la muraille de pierre, lui attribu&egrave;rent une seconde l&eacute;gende, un tr&eacute;sor serait cach&eacute; quelque part pr&egrave;s de l&rsquo;ar&egrave;ne. Si s&ucirc;r de la magie des lieux,  un cabaretier demande l&rsquo;autorisation de faire des fouilles. Tous attendent le verdicte, persuad&eacute;s que quelque chose se cache ici ! Apr&egrave;s des semaines de recherche, on ne trouva rien d&rsquo;autres que quelques pi&egrave;ces de monnaie et des tessons de c&eacute;ramiques. Voici un fantasme de', 'Le Palais Gallien est un des &eacute;difices les plus myst&eacute;rieux de Bordeaux. Aujourd&rsquo;hui situ&eacute; dans un quartier tranquille,  il est pendant bien longtemps au coeur de multiples l&eacute;gendes fantastiques. Sa vraie histoire est m&eacute;connue de beaucoup car elle a &eacute;t&eacute; consid&eacute;r&eacute;e comme inconvenante pendant tr&egrave;s longtemps. Si sorciers et d&eacute;mons n&rsquo;y sont certainement jamais all&eacute;s, brigands malhonn&ecirc;tes et femmes publiques s&rsquo;y sont bien install&eacute;s. Aujourd&rsquo;hui le Palais Gallien est surtout consid&eacute;r&eacute; comme le dernier &eacute;difice gallo-romain de Bordeaux.', '../IlluArticles/illu_art_3.jpg', 0, 'ANGL0201', 'THE0101', 'FRAN01'),
('4', '2020-03-30', 'Bordeaux sous l&rsquo;emprise du Dragon', 'Dans une &eacute;poque o&ugrave; la Capitale du vin appartenait aux anglais, existait une vieille tour aux attraits gallo-romains. Le Dragon n&rsquo;&eacute;tait pas seulement le surnom des l&eacute;opards ornant l&rsquo;&eacute;tendard anglais, mais aussi le nom du monstre qui habitait cette tour. Voici la l&eacute;gende du Dragon de la Vieille Tour.', 'Arm&eacute;e  d&rsquo;un canon pour sonner l&rsquo;alarme en tant de guerre, c&rsquo;&eacute;tait la fonction de la tour borde...', 'Arm&eacute;e  d&rsquo;un canon pour sonner l&rsquo;alarme en tant de guerre, c&rsquo;&eacute;tait la fonction de la tour bordelaise au beau milieu du quatorzi&egrave;me si&egrave;cle. En effet, le canon retentissait d&egrave;s la venue d&rsquo;un ennemi ou bien lors du couvre-feu. Vous connaissez sans doute la rue de la Vieille Tour, cette rue s&rsquo;appelait &agrave; cette p&eacute;riode la rue du Canon et c&rsquo;est dans celle-ci que fut construite la fameuse tour. Au sommet de cette tour &eacute;tait dispos&eacute; l&rsquo;&eacute;tendard anglais &agrave; deux l&eacute;opards. Le peuple avait donn&eacute; un nom &agrave; cet animal : le Dragon. C&rsquo;est la l&eacute;gende d&rsquo;un dragon qui s&rsquo;installe dans la fameuse tour.\r\n\r\n La cr&eacute;ature tout droit sorti d&rsquo;un livre fantastique semait la terreur parmi la population environnantes pouvant r&eacute;pandre peste et chol&eacute;ra d&rsquo;un simple souffle. Il menace les habitants et n&rsquo;h&eacute;sitait pas &agrave; d&eacute;vorer leurs enfants sur son passage. Il demanda aux habitants qu&rsquo;une personne de jeune &acirc;ge et nourritures lui soit amen&eacute;s chaque dimanche. Terroris&eacute;s par le Dragon, les habitants se r&eacute;signent &agrave; r&eacute;pondre &agrave; ses faveurs en offrant leurs enfants &agrave; la b&ecirc;te. L&rsquo;emprise du dragon sur Bordeaux durera de nombreux mois.', 'La jeune fille et le secret du Dragon', 'Une jeune fille,  celle qui fera trembler le destin de la cr&eacute;ature. Une fille au nom de Nicolette qui d&rsquo;elle-m&ecirc;me d&eacute;cide d&rsquo;entrer dans la redoutable Tour du Dragon au p&eacute;ril de sa vie. Le charme de la jeune fille subjugue le monstre aux &eacute;cailles lui promettant vins et d&eacute;licieux mets. Avec clairvoyance, elle discute avec le monstrueux dragon et c&rsquo;est ainsi que son secret lui &eacute;chappe. L&rsquo;impitoyable Dragon ne craignait absolument rien sauf une seule et unique chose. Le b&acirc;ton miraculeux de Saint Martial &eacute;tait la seule chose qu&rsquo;il redoutait sur terre.\r\n\r\nUn art&eacute;fact &agrave; l&rsquo;origine de p&eacute;rip&eacute;ties sans fin, celui que le Pape Saint Pierre offre &agrave; Martial et qui plus tard, lui permettra de convertir l&rsquo;Aquitaine au christianisme. Le b&acirc;ton sera par la suite plac&eacute; &agrave; la Cath&eacute;drale de Limoges.\r\n\r\nLorsque la cr&eacute;ature sanguinaire se d&eacute;lectait sans mod&eacute;ration de son vin, Nicolette, dans la plus grande discr&eacute;tion profita de l&rsquo;&eacute;garement du monstre pour &eacute;crire un message. Elle l&rsquo;&eacute;crit  avec son sang sur un carreau de brique qu&rsquo;elle finit par lancer &agrave; travers une meurtri&egrave;re afin d&rsquo;informer la population. Le message &eacute;crit en Gascogne &eacute;tait le suivant : &ldquo; Appeler &agrave; l&rsquo;aide la crosse de saint Martial et le monstre', 'La chute du Dragon et l&rsquo;avidit&eacute; bordelaise', 'Les limousins vouant un profond culte au puissant art&eacute;fact rendait la t&acirc;che difficile. Apr&egrave;s de longues n&eacute;gociations, les limousins r&eacute;clament en &eacute;change l&rsquo;otage de six magistrats en attendant le retour de l&rsquo;objet occulte sur sa terre.\r\n\r\nLes bordelais, le b&acirc;ton &agrave; leur possession se dirige vers la Tour du Dragon. D&egrave;s que la sainte relique pris contact avec la Tour, le Dragon par son instinct imp&eacute;tueux s''enfuit imm&eacute;diatement &agrave; la vue du b&acirc;ton sacr&eacute;e en sautant tout droit vers la Garonne. Engourdi par l&rsquo;alcool et la nourriture, il par accident s''&eacute;croulera dans l&rsquo;oc&eacute;an men&eacute; par le fleuve. C&rsquo;est ainsi que la vie de l&rsquo;impitoyable Dragon s&rsquo;&eacute;teint sous une pluie de flammes, engloutis dans les abysses pour toujours. \r\n\r\nLe b&acirc;ton ne se reposera plus dans la Cath&eacute;drale de Limoges puisque les Bordelais obnubil&eacute;s par la source de pouvoir que repr&eacute;sentait la relique, d&eacute;cident de s&rsquo;en emparer totalement au d&eacute;triment de leurs cong&eacute;n&egrave;res otages. Ils &eacute;taient bien au courant des miracles que pouvait prodiguer cette relique. Les limousins finiront par comprendre cette mascarade et d&eacute;cident d&rsquo;ex&eacute;cuter les otages en apprenant que ceux-ci n&rsquo;&eacute;taient que simples h&egrave;res pay&eacute;s pour jouer les d&eacute;tenus.', 'C&rsquo;est ainsi que se termine l&rsquo;effrayante l&eacute;gende du Dragon de la Vieille Tour. Le dragon qui p&eacute;rit dans les abysses et l&rsquo;avidit&eacute; des bordelais qui mettra en p&eacute;rils les otages. Une tour qui n&rsquo;est dor&eacute;navant plus de ce monde mais la rue quant &agrave; elle existe toujours et est connue de tous les bordelais. La l&eacute;gende est du moins inspir&eacute;e par le symbole de l&rsquo;&eacute;tendard anglais du Moyen- ge que portait la tour pendant cette p&eacute;riode.', '../IlluArticles/illu_art_4.jpg', 11, 'ANGL0201', 'THE0101', 'FRAN01'),
('5', '2020-03-30', 'Les morts de la crypte de Saint Michel', 'La fl&egrave;che Saint Michel, deuxi&egrave;me plus haut clocher de France est une visite incontournable de la ville de Bordeaux. Cependant, la basilique n&rsquo;est pas seulement connue pour son panorama incroyable de la ville. Des rumeurs racontent qu&rsquo;il y avait des Momies qui erraient &agrave; Bordeaux. Un r&eacute;cit digne des contes horrifiques et chamboule les esprits de nos chers bordelais encore &agrave; ce jour. Il existe de nombreux mythes et l&eacute;gendes sur la Perle d&rsquo;Aquitaine et celui-ci fait bien parti des plus connus.', '1791&hellip; C&rsquo;est la fameuse ann&eacute;e o&ugrave; ces myst&eacute;rieux corps ont &eacute;t&eacute; d&eacute;couverts. Une grande trouvaille lo...', '1791&hellip; C&rsquo;est la fameuse ann&eacute;e o&ugrave; ces myst&eacute;rieux corps ont &eacute;t&eacute; d&eacute;couverts. Une grande trouvaille localis&eacute;e aux alentours de l&rsquo;ancien centre de Bordeaux, le quartier de Saint Michel. L&rsquo;histoire commence tout d&rsquo;abord lorsque le directoire d&eacute;partemental par peur des &eacute;pid&eacute;mies, ordonne la suppression du cimeti&egrave;re paroissiale entourant l&rsquo;&eacute;difice populaire, c&rsquo;est alors que des dizaines de corps momifi&eacute;s sont d&eacute;couverts. Le nombre exact est difficile &agrave; d&eacute;terminer mais d&rsquo;apr&egrave;s les donn&eacute;es dont nous disposons, on peut affirmer qu&rsquo;il y avait 74 corps d&rsquo;hommes, de femmes et d&rsquo;enfants. L&rsquo;&eacute;tat de conservation de ces cadavres est impressionnant mais pas pour le moins &eacute;trange. Les param&egrave;tres physiques naturel du lieu comme l&rsquo;air et le sol argileux seraient la raison de leur &eacute;tat irr&eacute;prochable. C&rsquo;est encore &agrave; l&rsquo;heure actuelle de simples hypoth&egrave;ses puisqu''aucune &eacute;tude arch&eacute;ologique ou scientifique n&rsquo;a &eacute;t&eacute; trait&eacute; sur les tr&eacute;pass&eacute;s antiques. Pour le moment aucune r&eacute;ponse ne peut &ecirc;tre apport&eacute;e &agrave; leur origine. Ces &acirc;mes seront expos&eacute;es dans le caveau de ce monument embl&eacute;matique qu&rsquo;est la basilique Saint Michel et feront l&rsquo;objet, plus tard, d&rsquo;une d&eacute;couverte des plus horrifiques.', 'Une attraction d&eacute;routante, &ldquo; des t&ecirc;tes sinistres et terribles qui semblaient m&rsquo;appeler &ldquo;.', 'Dispos&eacute;s en cercle, serr&eacute;s et debout sur les six c&ocirc;t&eacute;s d&rsquo;une salle lugubre. Ces hommes, femmes et enfants deviennent tr&egrave;s vite sujet de curiosit&eacute; et l''&eacute;trange attraction de Bordeaux &agrave; cette &eacute;poque. Ils portent un nom qui fera le tour du pays : &ldquo;Les Momies de Saint Michel&ldquo;.\r\n\r\nLes visiteurs se font nombreux et parmi eux, de c&eacute;l&egrave;bres personnages y figurent tels que Stendhal, Th&eacute;ophile Gautier ou encore Gustave Flaubert. Victor Hugo lors de sa visite en 1843 n&rsquo;h&eacute;site pas &agrave; exprimer son sentiment dans son r&eacute;cit &agrave; la d&eacute;couverte de ces corps &agrave; l&rsquo;allure crisp&eacute;e :  &laquo; Imaginez un cercle de visages effrayants au centre duquel j&rsquo;&eacute;tais. Les corps noir&acirc;tres et nus s&rsquo;enfon&ccedil;aient et se perdaient dans la nuit. Mais je voyais une foule de t&ecirc;tes sinistres et terribles qui semblaient m&rsquo;appeler avec des bouches toutes grandes ouvertes, mais sans voix, et qui me regardaient avec des orbites sans yeux. &raquo;.\r\n\r\nEffrayant est l&rsquo;expression que donne le visage de ces spectres, certains pleurent ou sourient et d&rsquo;autres vous regardent. Avec le temps, l&rsquo;imagination des guides bordelais vient enrichir et mystifier l&rsquo;identit&eacute; et l&rsquo;histoire des tr&eacute;pass&eacute;s antiques pour impressionner les visiteurs. Des l&eacute;gendes sont n&eacute;es', 'Le grand d&eacute;part des momies', 'La crypte fut un lieu vedette du &ldquo;myst&eacute;rieux Bordeaux&rdquo; durant des si&egrave;cles. Ces innombrables visites am&egrave;nent &agrave; l''alt&eacute;ration de l&rsquo;&eacute;tat des fameuses momies et les r&eacute;elles raisons pourraient vous surprendre&hellip; La profanation&hellip; Raison premi&egrave;re de l&rsquo;alt&eacute;ration des cadavres. Depuis l&rsquo;arriv&eacute;e des momies sous la basilique, le myst&egrave;re s&rsquo;installe parmi les populations bordelaises comme si ces myst&eacute;rieux corps hantaient la crypte. De nombreux visiteurs des lieux n&rsquo;h&eacute;sitent pas &agrave; toucher les cadavres par curiosit&eacute; ou obscures raisons. Certains n''h&eacute;sitent pas &agrave; voler un bout de peau venant des corps, ils faisaient cela en guise de bon pr&eacute;sages. D&rsquo;autres vol&egrave;rent des ossements. Mais ce n&rsquo;&eacute;tait pas les seules raisons de l&rsquo;alt&eacute;ration, l&rsquo;&eacute;clairage du lieu en faisait partie.\r\n\r\n&Agrave; cause de ces diff&eacute;rentes d&eacute;gradations et par respect pour les d&eacute;funts, il a &eacute;t&eacute; d&eacute;cid&eacute; en 1979 d&rsquo;enlever les momies de la crypte mettant un terme &agrave; cette &ldquo;ronde macabre&rdquo;. Elles seront donc d&eacute;plac&eacute;es au cimeti&egrave;re de la Chartreuse. En 2013, les momies &ldquo; font leur retour&rdquo; avec une s&eacute;rie de photos et un documentaire qui retrace une visite de 1959 &agrave; leur lieu d&rsquo;exposition initiale, projet&eacute; sur le mur de la crypte.', 'Bordeaux n&rsquo;est en aucun cas une ville qui manque de myst&egrave;res et les Momies de Saint Michel nous le confirment encore une fois. De nombreuses histoires, plus intrigantes les unes que les autres sont racont&eacute;es par les guides locaux au fil des si&egrave;cles. Mais n&rsquo;oublions pas que ces mythes et l&eacute;gendes sont entour&eacute;es de beaucoup d&rsquo;&eacute;l&eacute;ments sans r&eacute;ponse. Pourquoi des corps ensevelis &agrave; cet endroit pr&eacute;cis ?  Quelle est la raison de leur momification ? Comment expliquer une telle conservation ? Les derni&egrave;res fouilles dans le cadre des r&eacute;novations de la place datant de 2010 ont permis de d&eacute;celer une centaine de corps autour de la basilique, mais aucune momies parmi eux. Les momies quant &agrave; elles ont pu retrouver leur repos mais l&rsquo;affaire est donc loin d&rsquo;&ecirc;tre &eacute;lucid&eacute;e.', '../IlluArticles/illu_art_5.jpg', 0, 'ANGL0101', 'THE0201', 'FRAN01'),
('6', '2020-03-30', 'Mode d&rsquo;emploi : Comment cr&eacute;er&nbsp;une histoire terrifiante 100% bordelaise en trois &eacute;tapes ?', 'Bordeaux est une ville charg&eacute;e d&rsquo;histoire, de petites rues sombres, de vieux b&acirc;timents, qui\r\naujourd&rsquo;hui font l&rsquo;objet de nombreux contes et l&eacute;gendes. Mais dans cet article, nous\r\nn&rsquo;allons pas lire une autre histoire sur des fant&ocirc;mes ou des esprits. Ici, nous te proposons\r\nde cr&eacute;er ta propre l&eacute;gende, d&rsquo;&eacute;crire ton histoire. Alors munis&nbsp;toi d&rsquo;un bout feuille, d&rsquo;un petit\r\ncrayon et d&rsquo;une pinc&eacute;e d&rsquo;imagination, car nous allons te r&eacute;v&eacute;ler les myst&eacute;rieux secrets qui\r\nse cachent derri&egrave;re les histoires.', 'Bordeaux est une ville charg&eacute;e d&rsquo;histoire, de petites rues sombres, de vieux b&acirc;timents, qui aujou...', '1&egrave;re &eacute;tape : Mise en place de l&rsquo;effroyable d&eacute;cor&nbsp;\r\nLe plus important dans une histoire terrifiante, c&rsquo;est de planter le d&eacute;cor. Si tu r&eacute;ussis cette\r\n&eacute;tape tu as quasiment la moiti&eacute; de ton histoire. Celui-ci ne repr&eacute;sente pas seulement la\r\nsc&egrave;ne, mais aussi les petits d&eacute;tails autour du r&eacute;cit ou encore les acteurs. Ces derniers\r\nsont PRIMORDIAUX. Il te faut absolument une population ; mais pas n&rsquo;importe laquelle, il\r\nest essentiel que celle-ci soit tr&egrave;s cr&eacute;dule. Le type de personne qui croit dur comme fer\r\nqu&rsquo;il est possible qu&rsquo;un serpent au fond d&rsquo;un puits soit &agrave; l&rsquo;origine d&rsquo;une dizaine de meurtres\r\ndans la rue du Mirail. Une fois ce public trouv&eacute;, il faut que tu commences &agrave; r&eacute;ellement\r\ncr&eacute;er ton histoire. Pour cela il faut trouver un lieu, un endroit o&ugrave; tout &agrave; commencer, o&ugrave; la\r\nl&eacute;gende est n&eacute;e.\r\nTu as de la chance, Bordeaux est une ville charg&eacute;e d&rsquo;histoire qui ne demande qu&rsquo;&agrave; livrer\r\nses secrets. Imagine un peu l&rsquo;ambiance, nous sommes un soir de novembre, il est 3h du\r\nmatin &agrave; quelques pas de la base sous-marine. L&rsquo;ombre de l&rsquo;imposant b&acirc;timent domine les\r\nhabitations environnantes&hellip; &Agrave; toi d&rsquo;imaginer la suite, choisis&nbsp;un endroit qui, rien qu&rsquo;&agrave; sa\r\nvue, te communique une &eacute;trange sensation. L&agrave;, on co', '2e &eacute;tape : La propagation de l&rsquo;effrayante histoire', 'Beaucoup de r&eacute;cits&nbsp;ont du potentiel. Ils regorgent de secrets, de myst&egrave;res non d&eacute;voil&eacute;s. Et\r\npourtant ils ne sont jamais partag&eacute;s, ils&nbsp;restent&nbsp;des histoires, mais jamais personne ne\r\nfrissonne &agrave; leur &eacute;vocation. La raison de cet oubli ? Une mauvaise communication de\r\nl&rsquo;auteur. Expliquer qu&rsquo;un fant&ocirc;me hante la cath&eacute;drale Saint-Andr&eacute; ne suffit pas &agrave;\r\nprovoquer la peur. Pour qu&rsquo;une histoire soit entendue et r&eacute;p&eacute;ter il faut que tu soignes ton\r\nstorytelling. Il faut que l&rsquo;histoire paraisse possible, mais avec une pointe d&rsquo;impossible pour\r\nobtenir la recette parfaite. Dans les meilleures histoires d&rsquo;horreur comme dans les threads\r\nde Squeezie, il y a des moments de secret o&ugrave; le spectateur ne sait pas comment l&rsquo;histoire\r\nva se finir. C&rsquo;est ce sentiment-l&agrave; que tu dois rechercher. Pour cela il y a un moyen tr&egrave;s\r\nsimple : ne r&eacute;v&egrave;le pas tous les secrets de ton histoire d&egrave;s le d&eacute;but. Cr&eacute;e&nbsp;du suspens.\r\nExemple tr&egrave;s simple, jadis, dans la basilique Saint-Michel, r&eacute;sidait des momies qui ont &eacute;t&eacute;\r\nretrouv&eacute;es&nbsp;l&agrave; au XVIIIe si&egrave;cle, mais dans cette histoire on ne sait pas d&rsquo;o&ugrave; elles viennent,\r\nni qui elles sont, ni la raison pour laquelle elles ont &eacute;t&eacute; plac&eacute;es&nbsp;ici. Tous ces myst&egrave;res\r\nlaissent la place aux rumeurs&hellip;', '3e &eacute;tape : Une raison de cr&eacute;er une effroyable histoire', 'Les &eacute;tapes pr&eacute;c&eacute;dentes sont importantes mais celle-ci est essentielle. Tout le monde\r\npense que les &eacute;crivains cr&eacute;ent seulement pour le plaisir, mais si leur raison de r&eacute;diger &eacute;tait\r\nun peu moins honorable&nbsp;? Pourquoi des gens inventent des histoires qui ont pour seul but\r\nde provoquer la peur &agrave; d&rsquo;autres ? Pourquoi toi qui lis&nbsp;cet article, tu veux &eacute;crire une histoire\r\nterrifiante ? Est-ce seulement parce qu&rsquo;en ce moment m&ecirc;me tu es en confinement avec\r\ntes enfants et que tu cherches une histoire capable de leur faire si peur qu&rsquo;ils n&rsquo;oseront\r\nplus t&rsquo;approcher pendant au moins 6 jours ? Ou alors c&rsquo;est pour une raison encore plus\r\n\r\nhonteuse. Par exemple reprenons l&rsquo;histoire du serpent assassin au fond du puits. &Agrave; la\r\nbase, la personne qui a invent&eacute; cette l&eacute;gende ne pouvait &ecirc;tre que le meurtrier. Cr&eacute;er&nbsp;cette\r\nfable lui a peut-&ecirc;tre permis de tuer le mari de sa&nbsp;ma&icirc;tresse&nbsp;et de s&rsquo;enfuir avec elle loin de\r\nBordeaux. Et si derri&egrave;re chaque histoire d&rsquo;horreur il y avait un meurtrier, tel que le c&eacute;l&egrave;bre\r\ntueur en s&eacute;rie surnomm&eacute; &laquo;&nbsp;La Barbe bleue de Gambais&nbsp;&raquo;, assez intelligent et dou&eacute; pour\r\ntransformer son meurtre en l&eacute;gende. Alors, maintenant demande toi : pourquoi &eacute;cris-tu\r\nune histoire terrifiante ?', 'Voil&agrave;, maintenant que tu connais tous les myst&eacute;rieux secrets qui se cachent derri&egrave;re les\r\nmeilleures histoires d&rsquo;horreur &agrave; toi d&rsquo;&eacute;crire la tienne. Visite chaque recoin de notre belle\r\nville pour t&rsquo;inspirer au maximum des secrets qu&rsquo;elle abrite. Et surtout n&rsquo;h&eacute;site pas &agrave; nous\r\nla partager gr&acirc;ce au #myhorrybord. Notre &eacute;quipe s&eacute;lectionnera les plus terrifiantes pour\r\nles publier sur nos r&eacute;seaux.&nbsp;\r\nPS : Pour effrayer tes lecteurs n&rsquo;oublie pas de pr&eacute;ciser que l&rsquo;histoire est inspir&eacute;e de faits\r\nr&eacute;els.', '../IlluArticles/illu_art_6.jpg', 0, 'ANGL0201', 'THE0301', 'FRAN01'),
('7', '2020-03-30', 'Elle fait des milliers de morts mais l''&eacute;tat ferme les yeux. Comment faire face pour &eacute;viter le drame?', 'Vous ne savez toujours pas de quoi nous parlons mais nous pouvons vous assurer une chose. Vous l''avez d&eacute;j&agrave; rencontr&eacute;e de pr&egrave;s ou de loin.\r\nLa situation o&ugrave; l''avez aper&ccedil;u d&eacute;pend de chacun. Pour certain cela arrive dans les moments les plus festifs mais pour d''autres, dans les moments les plus tragiques. Elle est fourbe et on se trompe facilement sur son compte. &Agrave; l&rsquo;apparence inoffensive, elle a d&eacute;j&agrave; fait environ 10 000 morts depuis le d&eacute;but de cette ann&eacute;e 2020 en France.', 'D&eacute;couvrez comment s''en pr&eacute;munir et comment sauver vos proches.', 'N&eacute;e de la main de l''homme gr&acirc;ce &agrave; des proc&eacute;d&eacute;s transmis de g&eacute;n&eacute;rations en g&eacute;n&eacute;rations. 10000 avant la naissance de J&eacute;sus-Christ, elle faisait d&eacute;j&agrave; des ravages dans nos cit&eacute;s. Depuis des mill&eacute;naires, elle est crainte comme &eacute;tant la meilleure meurtri&egrave;res de notre &acirc;ge et de l''ancien. L''homme s''est tr&egrave;s vite laiss&eacute; s&eacute;duire, il &eacute;tait impossible de l''arr&ecirc;ter. Comme un pacte avec le diable, il s''est laiss&eacute; envo&ucirc;ter par les plaisirs que cette chose lui procure en &eacute;change d''un total abandons de ses sens. Pendant des si&egrave;cles, elle a r&eacute;ussi &agrave; s''infiltrer,  &agrave; nous duper, &agrave; nous s&eacute;duire jusqu''&agrave; rentrer chez nous et &agrave; attendre patiemment le bon moment pour frapper.\r\n4000 ans avant J&eacute;sus-Christ, conqu&ecirc;te de l''Egypte o&ugrave; il devient l&eacute;gal de se confronter ou de pactiser avec elle. On retrouve m&ecirc;me des liens entre cette chose et la religion.  Elle a l''horrible fiert&eacute; de pouvoir s''attribuer le m&eacute;rite d''avoir influencer et manipuler les gens jusqu''&agrave; &ecirc;tre associ&eacute;e &agrave; des dieux grecs, romains ou m&ecirc;me &eacute;gyptiens. Elle a si bien fait son travail qu''elle se retrouve dans les temples. Petit &agrave; petit, ce monstre prend sa place et s''installe dans notre vie.', 'Comment proc&egrave;de-t-elle?', 'Depuis le d&eacute;but nous disons qu''elle tue beaucoup de gens mais nous n''avons pas donner ses effroyables proc&eacute;d&eacute;s. Sa technique favorite ? Profiter d''un moment de faiblesse ou d''une situation, l&agrave; o&ugrave; m&ecirc;me une promenade sur les quais ne peux pas nous remettre sur pieds. &Agrave; ce moment l&agrave;, cette fourbe frappe ! Sa technique est bien rod&eacute;e et un peu sadique car elle n''attaque pas toujours une seule fois, elle tue &agrave; petit feu. Dans ces moments o&ugrave; votre r&eacute;sistance est au point mort, elle vous envo&ucirc;te et vous s&eacute;duit avec la possibilit&eacute; d''oublier tous vos soucis et de vous laisser envahir par un sentiment de l&eacute;g&egrave;ret&eacute; et de libert&eacute;. Mais ce bref bien-&ecirc;tre a un prix. Vous devez lui c&eacute;der le contr&ocirc;le et elle fait souvent ressortir vos plus grands d&eacute;mons, votre face cach&eacute;e et vous fait tout ext&eacute;rioriser sans que vous ne vous en rendiez compte. Cela arrive une fois, deux fois, trois fois, jusqu''&agrave; la fois de trop o&ugrave; allez trop loin et c''est l''overdose. Elle prend totalement le dessus sur vous, vous n''avez plus du tout le contr&ocirc;le, d''abord vos pires d&eacute;mons deviennent ma&icirc;tres de vos gestes pour arriver au stade ou m&ecirc;me eux ne les contr&ocirc;lent plus rien. Vous sombrez. Vous avez le choix entre tomber dans l', 'Toutes ses formes', 'Pour mieux nous avoir et mieux nous s&eacute;duire, celle-ci a &eacute;volu&eacute; et s''est d&eacute;velopp&eacute;e sous diff&eacute;rentes formes. Son but ? Toucher toujours plus de gens pour arriver &agrave; ses fins plus facilement. Gr&acirc;ce &agrave; &ccedil;a, elle s''immisce dans nos vies. Mais ce n''est pas la seule fautive, nous jouons avec elle pour nos plaisirs festifs et elle joue avec nous quand nous baissons notre garde. C''est trop facile de se faire avoir car elle saute sur la moindre occasion pour nous d&eacute;munir de tous nos sens. Les mani&egrave;res de la consommer sont nombreuses, on peut en lister au moins une centaine. Par contre elle vous aura avant m&ecirc;me d''avoir pu en tester trois. Les bars et les magasins sont ses complices, ils lui permettent de circuler en toute libert&eacute;. En leur sein il y en a pour tous les go&ucirc;ts, cela va des alcools doux pour sombrer en douceur, jusqu''aux alcools forts pour ceux qui aiment jouer avec le feu. Elle a su s''adapter aux plus r&eacute;sistants avec ses cocktails toujours plus color&eacute;s et vari&eacute;s. Pour ne pas perdre de temps, ne vous en faites pas ,elle a pens&eacute; &agrave; tout : une bonne dose de vodka pour s''emparer de vous et vous assommer d''un seul coup.', 'Nous sommes bien conscients qu''avec cet article nous n''allons pas vous faire stopper votre consommation. Car au vu de son nombre d''ann&eacute;es d&rsquo;exigence, la majorit&eacute; n''a pas cherch&eacute; &agrave; fuir ce nectar aux m&eacute;faits maintenant biens connus. Cependant, vous pourrez peut-&ecirc;tre faire attention &agrave; ne pas trop vous laisser envo&ucirc;ter par sa malice. Et savoir vous stopper quand elle commence &agrave; s''emparer de vous pour &eacute;viter l''in&eacute;vitable. Bien que ce liquide permettent d''oublier, il n&rsquo;efface en rien les faits accomplis et vous fera juste sombrer petit &agrave; petit dans un cercle vicieux jusqu''&agrave; vous avoir. On peut terminer par une question, Pourquoi l''homme est-il toujours tent&eacute; par le diable et prend-il autant de plaisir &agrave; jouer avec le feu?', '../IlluArticles/illu_art_7.png', 0, 'ANGL0201', 'THE0401', 'FRAN01');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `NumCom` char(6) NOT NULL,
  `DtCreC` datetime DEFAULT NULL,
  `PseudoAuteur` char(20) NOT NULL,
  `EmailAuteur` char(60) NOT NULL,
  `TitrCom` char(60) NOT NULL,
  `LibCom` text NOT NULL,
  `NumArt` char(10) NOT NULL,
  PRIMARY KEY (`NumCom`),
  KEY `COMMENT_FK` (`NumCom`),
  KEY `FK_ASSOCIATION_7` (`NumArt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

CREATE TABLE IF NOT EXISTS `date` (
  `DtJour` datetime NOT NULL,
  PRIMARY KEY (`DtJour`),
  KEY `DATE_FK` (`DtJour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `date`
--

INSERT INTO `date` (`DtJour`) VALUES
('2017-12-12 00:00:00'),
('2018-11-09 00:00:00'),
('2018-12-01 00:00:00'),
('2018-12-12 00:00:00'),
('2018-12-12 09:00:00'),
('2018-12-12 11:00:00'),
('2018-12-13 00:00:00'),
('2018-12-17 00:00:00'),
('2018-12-18 00:00:00'),
('2019-01-11 00:00:00'),
('2019-01-13 00:00:00'),
('2019-01-17 00:00:00'),
('2019-02-22 14:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `NumLang` char(8) NOT NULL,
  `Lib1Lang` char(25) DEFAULT NULL,
  `Lib2Lang` char(45) DEFAULT NULL,
  `NumPays` char(4) DEFAULT NULL,
  PRIMARY KEY (`NumLang`),
  KEY `LANGUE_FK` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `langue`
--

INSERT INTO `langue` (`NumLang`, `Lib1Lang`, `Lib2Lang`, `NumPays`) VALUES
('ALLE01', 'Allemand(e)', 'Langue allemande', 'ALLE'),
('ANGL01', 'Anglais(e)', 'Langue anglaise', 'ANGL'),
('BULG01', 'Bulgare', 'Langue bulgare', 'BULG'),
('CAME01', 'qfqesd', 'edqdq', 'CAME'),
('ESPA01', 'Espagnol(e)', 'Langue espagnole', 'ESPA'),
('FRAN01', 'Français(e)', 'Langue française', 'FRAN'),
('ITAL01', 'Italien(ne)', 'Langue italienne', 'ITAL'),
('RUSS01', 'Russe', 'Langue russe', 'RUSS'),
('UKRA01', 'Ukrainien(ne)', 'Langue ukrainienne', 'UKRA');

-- --------------------------------------------------------

--
-- Structure de la table `motcle`
--

CREATE TABLE IF NOT EXISTS `motcle` (
  `NumMoCle` char(8) NOT NULL,
  `LibMoCle` char(30) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumMoCle`),
  KEY `MOTCLE_FK` (`NumMoCle`),
  KEY `FK_ASSOCIATION_5` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `motcle`
--

INSERT INTO `motcle` (`NumMoCle`, `LibMoCle`, `NumLang`) VALUES
('MTCL0101', 'diable', 'FRAN01'),
('MTCL0201', 'chateau', 'FRAN01'),
('MTCL0301', 'b&acirc;tisse', 'FRAN01'),
('MTCL0401', 'terrifiant', 'FRAN01'),
('MTCL0501', 'bordeaux', 'FRAN01'),
('MTCL0601', 'loup-garou', 'FRAN01'),
('MTCL0701', 'jugement', 'FRAN01'),
('MTCL0801', 'massacres', 'FRAN01'),
('MTCL0901', 'proc&egrave;s', 'FRAN01'),
('MTCL1001', 'Palais Gallien', 'FRAN01'),
('MTCL1101', 'Sorciers', 'FRAN01'),
('MTCL1201', 'L&eacute;gende', 'FRAN01'),
('MTCL1301', 'momies', 'FRAN01'),
('MTCL1401', 'saintmichel', 'FRAN01'),
('MTCL1501', 'histoire', 'FRAN01'),
('MTCL1601', 'basilique', 'FRAN01');

-- --------------------------------------------------------

--
-- Structure de la table `motclearticle`
--

CREATE TABLE IF NOT EXISTS `motclearticle` (
  `NumArt` char(10) NOT NULL,
  `NumMoCle` char(8) NOT NULL,
  PRIMARY KEY (`NumArt`,`NumMoCle`),
  KEY `MOTCLEARTICLE_FK` (`NumArt`),
  KEY `MOTCLEARTICLE2_FK` (`NumMoCle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `motclearticle`
--

INSERT INTO `motclearticle` (`NumArt`, `NumMoCle`) VALUES
('1', 'MTCL0101'),
('3', 'MTCL0101'),
('7', 'MTCL0101'),
('1', 'MTCL0201'),
('4', 'MTCL0201'),
('1', 'MTCL0301'),
('1', 'MTCL0401'),
('6', 'MTCL0401'),
('7', 'MTCL0401'),
('2', 'MTCL0501'),
('3', 'MTCL0501'),
('5', 'MTCL0501'),
('6', 'MTCL0501'),
('7', 'MTCL0501'),
('2', 'MTCL0601'),
('2', 'MTCL0701'),
('2', 'MTCL0801'),
('7', 'MTCL0801'),
('2', 'MTCL0901'),
('3', 'MTCL1001'),
('3', 'MTCL1101'),
('3', 'MTCL1201'),
('5', 'MTCL1301'),
('5', 'MTCL1401'),
('5', 'MTCL1501'),
('6', 'MTCL1501'),
('5', 'MTCL1601');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `cdPays` char(2) NOT NULL,
  `numPays` char(4) NOT NULL,
  `frPays` varchar(255) NOT NULL,
  `enPays` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPays`),
  KEY `PAYS_FK` (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=239 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`idPays`, `cdPays`, `numPays`, `frPays`, `enPays`) VALUES
(1, 'AF', 'AFGH', 'Afghanistan', 'Afghanistan'),
(2, 'ZA', 'AFRI', 'Afrique du Sud', 'South Africa'),
(3, 'AL', 'ALBA', 'Albanie', 'Albania'),
(4, 'DZ', 'ALGE', 'Algérie', 'Algeria'),
(5, 'DE', 'ALLE', 'Allemagne', 'Germany'),
(6, 'AD', 'ANDO', 'Andorre', 'Andorra'),
(7, 'AO', 'ANGO', 'Angola', 'Angola'),
(8, 'AI', 'ANGU', 'Anguilla', 'Anguilla'),
(9, 'AQ', 'ARTA', 'Antarctique', 'Antarctica'),
(10, 'AG', 'ANTG', 'Antigua-et-Barbuda', 'Antigua & Barbuda'),
(11, 'AN', 'ANTI', 'Antilles néerlandaises', 'Netherlands Antilles'),
(12, 'SA', 'ARAB', 'Arabie saoudite', 'Saudi Arabia'),
(13, 'AR', 'ARGE', 'Argentine', 'Argentina'),
(14, 'AM', 'ARME', 'Arménie', 'Armenia'),
(15, 'AW', 'ARUB', 'Aruba', 'Aruba'),
(16, 'AU', 'AUST', 'Australie', 'Australia'),
(17, 'AT', 'AUTR', 'Autriche', 'Austria'),
(18, 'AZ', 'AZER', 'Azerbaïdjan', 'Azerbaijan'),
(19, 'BJ', 'BENI', 'Bénin', 'Benin'),
(20, 'BS', 'BAHA', 'Bahamas', 'Bahamas, The'),
(21, 'BH', 'BAHR', 'Bahreïn', 'Bahrain'),
(22, 'BD', 'BANG', 'Bangladesh', 'Bangladesh'),
(23, 'BB', 'BARB', 'Barbade', 'Barbados'),
(24, 'PW', 'BELA', 'Belau', 'Palau'),
(25, 'BE', 'BELG', 'Belgique', 'Belgium'),
(26, 'BZ', 'BELI', 'Belize', 'Belize'),
(27, 'BM', 'BERM', 'Bermudes', 'Bermuda'),
(28, 'BT', 'BHOU', 'Bhoutan', 'Bhutan'),
(29, 'BY', 'BIEL', 'Biélorussie', 'Belarus'),
(30, 'MM', 'BIRM', 'Birmanie', 'Myanmar (ex-Burma)'),
(31, 'BO', 'BOLV', 'Bolivie', 'Bolivia'),
(32, 'BA', 'BOSN', 'Bosnie-Herzégovine', 'Bosnia and Herzegovina'),
(33, 'BW', 'BOTS', 'Botswana', 'Botswana'),
(34, 'BR', 'BRES', 'Brésil', 'Brazil'),
(35, 'BN', 'BRUN', 'Brunei', 'Brunei Darussalam'),
(36, 'BG', 'BULG', 'Bulgarie', 'Bulgaria'),
(37, 'BF', 'BURK', 'Burkina Faso', 'Burkina Faso'),
(38, 'BI', 'BURU', 'Burundi', 'Burundi'),
(39, 'CI', 'IVOI', 'Côte d''Ivoire', 'Ivory Coast (see Cote d''Ivoire)'),
(40, 'KH', 'CAMB', 'Cambodge', 'Cambodia'),
(41, 'CM', 'CAME', 'Cameroun', 'Cameroon'),
(42, 'CA', 'CANA', 'Canada', 'Canada'),
(43, 'CV', 'CVER', 'Cap-Vert', 'Cape Verde'),
(44, 'CL', 'CHIL', 'Chili', 'Chile'),
(45, 'CN', 'CHIN', 'Chine', 'China'),
(46, 'CY', 'CHYP', 'Chypre', 'Cyprus'),
(47, 'CO', 'COLO', 'Colombie', 'Colombia'),
(48, 'KM', 'COMO', 'Comores', 'Comoros'),
(49, 'CG', 'CONG', 'Congo', 'Congo'),
(50, 'KP', 'CNOR', 'Corée du Nord', 'Korea, Demo. People s Rep. of'),
(51, 'KR', 'CSUD', 'Corée du Sud', 'Korea, (South) Republic of'),
(52, 'CR', 'RICA', 'Costa Rica', 'Costa Rica'),
(53, 'HR', 'CROA', 'Croatie', 'Croatia'),
(54, 'CU', 'CUBA', 'Cuba', 'Cuba'),
(55, 'DK', 'DANE', 'Danemark', 'Denmark'),
(56, 'DJ', 'DJIB', 'Djibouti', 'Djibouti'),
(57, 'DM', 'DOMI', 'Dominique', 'Dominica'),
(58, 'EG', 'EGYP', 'Égypte', 'Egypt'),
(59, 'AE', 'EMIR', 'Émirats arabes unis', 'United Arab Emirates'),
(60, 'EC', 'EQUA', 'Équateur', 'Ecuador'),
(61, 'ER', 'ERYT', 'Érythrée', 'Eritrea'),
(62, 'ES', 'ESPA', 'Espagne', 'Spain'),
(63, 'EE', 'ESTO', 'Estonie', 'Estonia'),
(64, 'US', 'USA_', 'États-Unis', 'United States'),
(65, 'ET', 'ETHO', 'Éthiopie', 'Ethiopia'),
(66, 'FI', 'FINL', 'Finlande', 'Finland'),
(67, 'FR', 'FRAN', 'France', 'France'),
(68, 'GE', 'GEOR', 'Géorgie', 'Georgia'),
(69, 'GA', 'GABO', 'Gabon', 'Gabon'),
(70, 'GM', 'GAMB', 'Gambie', 'Gambia, the'),
(71, 'GH', 'GANA', 'Ghana', 'Ghana'),
(72, 'GI', 'GIBR', 'Gibraltar', 'Gibraltar'),
(73, 'GR', 'GREC', 'Grèce', 'Greece'),
(74, 'GD', 'GREN', 'Grenade', 'Grenada'),
(75, 'GL', 'GROE', 'Groenland', 'Greenland'),
(76, 'GP', 'GUAD', 'Guadeloupe', 'Guinea, Equatorial'),
(77, 'GU', 'GUAM', 'Guam', 'Guam'),
(78, 'GT', 'GUAT', 'Guatemala', 'Guatemala'),
(79, 'GN', 'GUIN', 'Guinée', 'Guinea'),
(80, 'GQ', 'GUIE', 'Guinée équatoriale', 'Equatorial Guinea'),
(81, 'GW', 'GUIB', 'Guinée-Bissao', 'Guinea-Bissau'),
(82, 'GY', 'GUYA', 'Guyana', 'Guyana'),
(83, 'GF', 'GUYF', 'Guyane française', 'Guiana, French'),
(84, 'HT', 'HAIT', 'Haïti', 'Haiti'),
(85, 'HN', 'HOND', 'Honduras', 'Honduras'),
(86, 'HK', 'KONG', 'Hong Kong', 'Hong Kong, (China)'),
(87, 'HU', 'HONG', 'Hongrie', 'Hungary'),
(88, 'BV', 'BOUV', 'Ile Bouvet', 'Bouvet Island'),
(89, 'CX', 'CHRI', 'Ile Christmas', 'Christmas Island'),
(90, 'NF', 'NORF', 'Ile Norfolk', 'Norfolk Island'),
(91, 'KY', 'CAYM', 'Iles Cayman', 'Cayman Islands'),
(92, 'CK', 'COOK', 'Iles Cook', 'Cook Islands'),
(93, 'FO', 'FERO', 'Iles Féroé', 'Faroe Islands'),
(94, 'FK', 'FALK', 'Iles Falkland', 'Falkland Islands (Malvinas)'),
(95, 'FJ', 'FIDJ', 'Iles Fidji', 'Fiji'),
(96, 'GS', 'GEOR', 'Iles Géorgie du Sud et Sandwich du Sud', 'S. Georgia and S. Sandwich Is.'),
(97, 'HM', 'HEAR', 'Iles Heard et McDonald', 'Heard and McDonald Islands'),
(98, 'MH', 'MARS', 'Iles Marshall', 'Marshall Islands'),
(99, 'PN', 'PITC', 'Iles Pitcairn', 'Pitcairn Island'),
(100, 'SB', 'SALO', 'Iles Salomon', 'Solomon Islands'),
(101, 'SJ', 'SVAL', 'Iles Svalbard et Jan Mayen', 'Svalbard and Jan Mayen Islands'),
(102, 'TC', 'TURK', 'Iles Turks-et-Caicos', 'Turks and Caicos Islands'),
(103, 'VI', 'VIEA', 'Iles Vierges américaines', 'Virgin Islands, U.S.'),
(104, 'VG', 'VIEB', 'Iles Vierges britanniques', 'Virgin Islands, British'),
(105, 'CC', 'COCO', 'Iles des Cocos (Keeling)', 'Cocos (Keeling) Islands'),
(106, 'UM', 'MINE', 'Iles mineures éloignées des États-Unis', 'US Minor Outlying Islands'),
(107, 'IN', 'INDE', 'Inde', 'India'),
(108, 'ID', 'INDO', 'Indonésie', 'Indonesia'),
(109, 'IR', 'IRAN', 'Iran', 'Iran, Islamic Republic of'),
(110, 'IQ', 'IRAQ', 'Iraq', 'Iraq'),
(111, 'IE', 'IRLA', 'Irlande', 'Ireland'),
(112, 'IS', 'ISLA', 'Islande', 'Iceland'),
(113, 'IL', 'ISRA', 'Israël', 'Israel'),
(114, 'IT', 'ITAL', 'Italie', 'Italy'),
(115, 'JM', 'JAMA', 'Jamaïque', 'Jamaica'),
(116, 'JP', 'JAPO', 'Japon', 'Japan'),
(117, 'JO', 'JORD', 'Jordanie', 'Jordan'),
(118, 'KZ', 'KAZA', 'Kazakhstan', 'Kazakhstan'),
(119, 'KE', 'KNYA', 'Kenya', 'Kenya'),
(120, 'KG', 'KIRG', 'Kirghizistan', 'Kyrgyzstan'),
(121, 'KI', 'KIRI', 'Kiribati', 'Kiribati'),
(122, 'KW', 'KWEI', 'Koweït', 'Kuwait'),
(123, 'LA', 'LAOS', 'Laos', 'Lao People s Democratic Republic'),
(124, 'LS', 'LESO', 'Lesotho', 'Lesotho'),
(125, 'LV', 'LETT', 'Lettonie', 'Latvia'),
(126, 'LB', 'LIBA', 'Liban', 'Lebanon'),
(127, 'LR', 'LIBE', 'Liberia', 'Liberia'),
(128, 'LY', 'LIBY', 'Libye', 'Libyan Arab Jamahiriya'),
(129, 'LI', 'LIEC', 'Liechtenstein', 'Liechtenstein'),
(130, 'LT', 'LITU', 'Lituanie', 'Lithuania'),
(131, 'LU', 'LUXE', 'Luxembourg', 'Luxembourg'),
(132, 'MO', 'MACA', 'Macao', 'Macao, (China)'),
(133, 'MG', 'MADA', 'Madagascar', 'Madagascar'),
(134, 'MY', 'MALA', 'Malaisie', 'Malaysia'),
(135, 'MW', 'MALW', 'Malawi', 'Malawi'),
(136, 'MV', 'MALD', 'Maldives', 'Maldives'),
(137, 'ML', 'MALI', 'Mali', 'Mali'),
(138, 'MT', 'MALT', 'Malte', 'Malta'),
(139, 'MP', 'MARI', 'Mariannes du Nord', 'Northern Mariana Islands'),
(140, 'MA', 'MARO', 'Maroc', 'Morocco'),
(141, 'MQ', 'MART', 'Martinique', 'Martinique'),
(142, 'MU', 'MAUC', 'Maurice', 'Mauritius'),
(143, 'MR', 'MAUR', 'Mauritanie', 'Mauritania'),
(144, 'YT', 'MAYO', 'Mayotte', 'Mayotte'),
(145, 'MX', 'MEXI', 'Mexique', 'Mexico'),
(146, 'FM', 'MICR', 'Micronésie', 'Micronesia, Federated States of'),
(147, 'MD', 'MOLD', 'Moldavie', 'Moldova, Republic of'),
(148, 'MC', 'MONA', 'Monaco', 'Monaco'),
(149, 'MN', 'MONG', 'Mongolie', 'Mongolia'),
(150, 'MS', 'MONS', 'Montserrat', 'Montserrat'),
(151, 'MZ', 'MOZA', 'Mozambique', 'Mozambique'),
(152, 'NP', 'NEPA', 'Népal', 'Nepal'),
(153, 'NA', 'NAMI', 'Namibie', 'Namibia'),
(154, 'NR', 'NAUR', 'Nauru', 'Nauru'),
(155, 'NI', 'NICA', 'Nicaragua', 'Nicaragua'),
(156, 'NE', 'NIGE', 'Niger', 'Niger'),
(157, 'NG', 'NIGA', 'Nigeria', 'Nigeria'),
(158, 'NU', 'NIOU', 'Nioué', 'Niue'),
(159, 'NO', 'NORV', 'Norvège', 'Norway'),
(160, 'NC', 'NOUC', 'Nouvelle-Calédonie', 'New Caledonia'),
(161, 'NZ', 'NOUZ', 'Nouvelle-Zélande', 'New Zealand'),
(162, 'OM', 'OMAN', 'Oman', 'Oman'),
(163, 'UG', 'OUGA', 'Ouganda', 'Uganda'),
(164, 'UZ', 'OUZE', 'Ouzbékistan', 'Uzbekistan'),
(165, 'PE', 'PERO', 'Pérou', 'Peru'),
(166, 'PK', 'PAKI', 'Pakistan', 'Pakistan'),
(167, 'PA', 'PANA', 'Panama', 'Panama'),
(168, 'PG', 'PAPU', 'Papouasie-Nouvelle-Guinée', 'Papua New Guinea'),
(169, 'PY', 'PARA', 'Paraguay', 'Paraguay'),
(170, 'NL', 'PBAS', 'pays-Bas', 'Netherlands'),
(171, 'PH', 'PHIL', 'Philippines', 'Philippines'),
(172, 'PL', 'POLO', 'Pologne', 'Poland'),
(173, 'PF', 'POLY', 'Polynésie française', 'French Polynesia'),
(174, 'PR', 'RICO', 'Porto Rico', 'Puerto Rico'),
(175, 'PT', 'PORT', 'Portugal', 'Portugal'),
(176, 'QA', 'QATA', 'Qatar', 'Qatar'),
(177, 'CF', 'CAFR', 'République centrafricaine', 'Central African Republic'),
(178, 'CD', 'CONG', 'République démocratique du Congo', 'Congo, Democratic Rep. of the'),
(179, 'DO', 'DOMI', 'République dominicaine', 'Dominican Republic'),
(180, 'CZ', 'TCHE', 'République tchèque', 'Czech Republic'),
(181, 'RE', 'REUN', 'Réunion', 'Reunion'),
(182, 'RO', 'ROUM', 'Roumanie', 'Romania'),
(183, 'GB', 'MIQU', 'Royaume-Uni', 'Saint Pierre and Miquelon'),
(184, 'RU', 'RUSS', 'Russie', 'Russia (Russian Federation)'),
(185, 'RW', 'RWAN', 'Rwanda', 'Rwanda'),
(186, 'SN', 'SENE', 'Sénégal', 'Senegal'),
(187, 'EH', 'SAHA', 'Sahara occidental', 'Western Sahara'),
(188, 'KN', 'NIEV', 'Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis'),
(189, 'SM', 'SMAR', 'Saint-Marin', 'San Marino'),
(190, 'PM', 'SPIE', 'Saint-Pierre-et-Miquelon', 'Saint Pierre and Miquelon'),
(191, 'VA', 'SSIE', 'Saint-Siège ', 'Vatican City State (Holy See)'),
(192, 'VC', 'SVIN', 'Saint-Vincent-et-les-Grenadines', 'Saint Vincent and the Grenadines'),
(193, 'SH', 'SLN_', 'Sainte-Hélène', 'Saint Helena'),
(194, 'LC', 'SLUC', 'Sainte-Lucie', 'Saint Lucia'),
(195, 'SV', 'SALV', 'Salvador', 'El Salvador'),
(196, 'WS', 'SAMO', 'Samoa', 'Samoa'),
(197, 'AS', 'SAMA', 'Samoa américaines', 'American Samoa'),
(198, 'ST', 'TOME', 'Sao Tomé-et-Principe', 'Sao Tome and Principe'),
(199, 'SC', 'SEYC', 'Seychelles', 'Seychelles'),
(200, 'SL', 'LEON', 'Sierra Leone', 'Sierra Leone'),
(201, 'SG', 'SING', 'Singapour', 'Singapore'),
(202, 'SI', 'SLOV', 'Slovénie', 'Slovenia'),
(203, 'SK', 'SLOQ', 'Slovaquie', 'Slovakia'),
(204, 'SO', 'SOMA', 'Somalie', 'Somalia'),
(205, 'SD', 'SOUD', 'Soudan', 'Sudan'),
(206, 'LK', 'SRIL', 'Sri Lanka', 'Sri Lanka (ex-Ceilan)'),
(207, 'SE', 'SUED', 'Suède', 'Sweden'),
(208, 'CH', 'SUIS', 'Suisse', 'Switzerland'),
(209, 'SR', 'SURI', 'Suriname', 'Suriname'),
(210, 'SZ', 'SWAZ', 'Swaziland', 'Swaziland'),
(211, 'SY', 'SYRI', 'Syrie', 'Syrian Arab Republic'),
(212, 'TW', 'TAIW', 'Taïwan', 'Taiwan'),
(213, 'TJ', 'TADJ', 'Tadjikistan', 'Tajikistan'),
(214, 'TZ', 'TANZ', 'Tanzanie', 'Tanzania, United Republic of'),
(215, 'TD', 'TCHA', 'Tchad', 'Chad'),
(216, 'TF', 'TERR', 'Terres australes françaises', 'French Southern Territories - TF'),
(217, 'IO', 'BOIN', 'Territoire britannique de l Océan Indien', 'British Indian Ocean Territory'),
(218, 'TH', 'THAI', 'Thaïlande', 'Thailand'),
(219, 'TL', 'TIMO', 'Timor Oriental', 'Timor-Leste (East Timor)'),
(220, 'TG', 'TOGO', 'Togo', 'Togo'),
(221, 'TK', 'TOKE', 'Tokélaou', 'Tokelau'),
(222, 'TO', 'TONG', 'Tonga', 'Tonga'),
(223, 'TT', 'TOBA', 'Trinité-et-Tobago', 'Trinidad & Tobago'),
(224, 'TN', 'TUNI', 'Tunisie', 'Tunisia'),
(225, 'TM', 'TURK', 'Turkménistan', 'Turkmenistan'),
(226, 'TR', 'TURQ', 'Turquie', 'Turkey'),
(227, 'TV', 'TUVA', 'Tuvalu', 'Tuvalu'),
(228, 'UA', 'UKRA', 'Ukraine', 'Ukraine'),
(229, 'UY', 'URUG', 'Uruguay', 'Uruguay'),
(230, 'VU', 'VANU', 'Vanuatu', 'Vanuatu'),
(231, 'VE', 'VENE', 'Venezuela', 'Venezuela'),
(232, 'VN', 'VIET', 'Viêt Nam', 'Viet Nam'),
(233, 'WF', 'WALI', 'Wallis-et-Futuna', 'Wallis and Futuna'),
(234, 'YE', 'YEME', 'Yémen', 'Yemen'),
(235, 'YU', 'YOUG', 'Yougoslavie', 'Saint Pierre and Miquelon'),
(236, 'ZM', 'ZAMB', 'Zambie', 'Zambia'),
(237, 'ZW', 'ZIMB', 'Zimbabwe', 'Zimbabwe'),
(238, 'MK', 'MACE', 'ex-République yougoslave de Macédoine', 'Macedonia, TFYR');

-- --------------------------------------------------------

--
-- Structure de la table `thematique`
--

CREATE TABLE IF NOT EXISTS `thematique` (
  `NumThem` char(8) NOT NULL,
  `LibThem` char(60) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumThem`),
  KEY `THEMATIQUE_FK` (`NumThem`),
  KEY `FK_ASSOCIATION_4` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `thematique`
--

INSERT INTO `thematique` (`NumThem`, `LibThem`, `NumLang`) VALUES
('THE0101', 'Histoire', 'FRAN01'),
('THE0201', 'Horreur', 'FRAN01'),
('THE0301', 'Apprentissage', 'FRAN01'),
('THE0401', 'Pr&eacute;vention', 'FRAN01');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Login` char(30) NOT NULL,
  `Pass` char(15) NOT NULL,
  `LastName` char(30) DEFAULT NULL,
  `FirstName` char(30) DEFAULT NULL,
  `EMail` char(50) NOT NULL,
  PRIMARY KEY (`Login`,`Pass`),
  KEY `USER_FK` (`Login`,`Pass`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `angle`
--
ALTER TABLE `angle`
  ADD CONSTRAINT `FK_ASSOCIATION_6` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`NumAngl`) REFERENCES `angle` (`NumAngl`),
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`NumThem`) REFERENCES `thematique` (`NumThem`),
  ADD CONSTRAINT `FK_ASSOCIATION_3` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_ASSOCIATION_7` FOREIGN KEY (`NumArt`) REFERENCES `article` (`NumArt`);

--
-- Contraintes pour la table `motcle`
--
ALTER TABLE `motcle`
  ADD CONSTRAINT `FK_ASSOCIATION_5` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);

--
-- Contraintes pour la table `motclearticle`
--
ALTER TABLE `motclearticle`
  ADD CONSTRAINT `FK_MotCleArt1` FOREIGN KEY (`NumMoCle`) REFERENCES `motcle` (`NumMoCle`),
  ADD CONSTRAINT `FK_MotCleArt2` FOREIGN KEY (`NumArt`) REFERENCES `article` (`NumArt`);

--
-- Contraintes pour la table `thematique`
--
ALTER TABLE `thematique`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
