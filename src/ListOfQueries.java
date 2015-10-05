/**
 * 
 */

/**
 * @author Sylvain
 *
 */
public class ListOfQueries {
	
	public static String QUERY_ADD_ATELIER = "INSERT INTO atelier (Titre, Theme"
			+ ", Laboratoire, Duree, Capacite) VALUES (?, ?, ?, ?, ?)";
	public static String QUERY_ADD_HORAIRE = "INSERT INTO horaire (Lundi_m, Lundi_ap, "
			+ "Mardi_m, Mardi_ap, Mercredi_m, Mercredi_ap, "
			+ "Jeudi_m, Jeudi_ap, Vendredi_m, Vendredi_ap, IdAtelier) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
	public static String QUERY_DELETE_ATELIER = "DELETE FROM atelier WHERE Id = ?";
	public static String QUERY_LIST_ATELIER = "SELECT * FROM atelier WHERE laboratoire = ?";
	public static String QUERY_COUNT_LABORATOIRE = "SELECT count(*) AS nb FROM laboratoire";
	public static String QUERY_MODIFY_ATELIER = "UPDATE atelier SET Titre = ?, Theme = ?, "
			+ "Laboratoire = ?, Duree = ?, Capacite = ? WHERE Id = ?";
	public static String QUERY_MODIFY_HORAIRE = "UPDATE horaire SET lundi_m = ?, lundi_ap = ?, "
			+ "mardi_m = ?, mardi_ap = ?, mercredi_m = ?, mercredi_ap = ?, "
			+ "jeudi_m = ?, jeudi_ap = ?, vendredi_m = ?, vendredi_ap = ? WHERE id = ?";
	public static String QUERY_GET_DETAILS_ATELIER = "SELECT * FROM atelier "
			+ "WHERE Id = ? AND (SELECT * FROM laboratoire WHERE laboratoire.Id = atelier.Laboratoire) "
			+ "AND (SELECT * FROM horaire WHERE horaire.IdAtelier = atelier.Id)";
	public static String QUERY_GET_LAST_ATELIER = "SELECT * FROM atelier WHERE Laboratoire = ? "
			+ "ORDER BY id DESC LIMIT 1";
}
