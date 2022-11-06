
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanovi`
--

CREATE TABLE `clanovi` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `ime` varchar(200) NOT NULL,
  `prezime` varchar(200) NOT NULL
) 

--
-- Dumping data for table `clanovi`
--

INSERT INTO `clanovi` (`id`, `email`, `password`, `ime`, `prezime`) VALUES
(18, 'n@gmail.com', 'nevena', 'nevena', 'markovic'),
(17, 'a@gmail.com', 'aleksa', 'aleksa', 'aleksic'),
(16, 'visnja@gmail.com', 'visnja', 'visnja', 'lalic'),
(20, 'marko@gmail.com', 'marko', 'marko', 'markovic'),
(21, 'v@gmail.com', 'vukan', 'vukan', 'tripkovic'),
(22, 'veki@gmail.com', 'vesna', 'veki', 'tripkovic'),
(23, 'p@gmail.com', 'petar', 'petar', 'kostic'),
(36, 'nina@gmail.com', 'nina', 'nina', 'peric');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE `novosti` (
  `idnovosti` int(11) NOT NULL,
  `naslov` varchar(200) NOT NULL,
  `tekst` varchar(2000) NOT NULL,
  `vreme` datetime DEFAULT NULL
)

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`idnovosti`, `naslov`, `tekst`, `vreme`) VALUES
(1, 'Poceo upis u BRC Skolu trcanja!', 'I ove jeseni pozivamo sugradjane da budu fizicki aktivni i prikljuce se velikoj beogradskoj trkackoj zajednici! Pod sloganom “From Zero to Hero” nova sezona skole', '2022-11-02 16:10:20'),
(2, 'BRC redakcija gori! Ovog leta treneri pisu za vas!', 'I dok odmaras imaces korisno trkacko stivo koje se lako vari a puno znaci ako se primeni. ', '2022-11-02 16:46:51'),
(3, 'Heroji Beograda: Prica o prestonici kroz trcanje', 'Svecanost pod nazivom “Heroji su medju nama” koju organizuje Beogradski maraton, ove godine obelezila su priznanja za pojedince i organizacije ', '2022-11-02 16:47:26'),
(10, 'BRC Plogging kod Brankovog mosta u nedelju!', 'Dzogirajte i ocistite okolinu sa Beogradskim trkackim klubom! 17. aprila u 9 casova organizujemo plogging kod Brankovog mosta, sa novobeogradske strane. ', '2022-11-02 16:53:16'),
(13, 'BRC na prolecnom polumaratonu u Budimpesti!', 'Jos uvek sumiramo utiske! Vikend za nama je bio vise nego putovanje na trku!', '2022-11-02 16:54:49');



ALTER TABLE `clanovi`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `novosti`
  ADD PRIMARY KEY (`idnovosti`);


ALTER TABLE `clanovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `novosti`
--
ALTER TABLE `novosti`
  MODIFY `idnovosti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
