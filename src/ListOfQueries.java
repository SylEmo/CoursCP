/**
 * 
 */

/**
 * @author Sylvain
 *
 */
public class ListOfQueries {
	
	public static String QUERY_ADD_ATELIER = "INSERT INTO atelier (Titre, Theme, Laboratoire, Duree, Capacite) VALUES ( ?, ?, ?, ?, ?)";
	public static String QUERY_DELETE_ATELIER = "DELETE FROM atelier WHERE Id = ? ";
	public static String QUERY_LIST_ATELIER = "SELECT Titre, Laboratoire FROM atelier";
	public static String QUERY_MODIFY_ATELIER = "UPDATE atelier SET Theme=?, Laboratoire=?, Duree=?, Capacite=? WHERE Id=? ";
	public static String QUERY_GET_DETAILS_ATELIER = "SELECT * FROM atelier WHERE Id=? AND (SELECT * FROM laboratoire WHERE laboratoire.Id = atelier.Laboratoire) AND (SELECT * FROM horaire where horaire.IdAtelier=atelier.Id)";
}
