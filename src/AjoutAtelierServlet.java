import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import javax.naming.NamingException;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


/**
 * @author Sylvain
 *
 */
@WebServlet("/ajout-atelier")
public class AjoutAtelierServlet extends HttpServlet {

	/* (non-Javadoc)
	 * @see javax.servlet.http.HttpServlet#doGet(javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
	 */
	@Override
	protected void doGet(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		RequestDispatcher rd = null;
    	rd = req.getRequestDispatcher("/WEB-INF/ajouter-atelier.jsp");
    	rd.forward(req, resp);
	}

	/* (non-Javadoc)
	 * @see javax.servlet.http.HttpServlet#doPost(javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
	 */
	@Override
	protected void doPost(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		RequestDispatcher rd = null;
		Connection dbConnection = null;
		PreparedStatement preparedStatementAtelier = null, preparedStatementCreatedAtelier = null, preparedStatementHoraire = null;
		ResultSet resultSetCreatedAtelier = null;
		int idCreatedAtelier = -1;
		
		try{
			dbConnection = new DatabaseConnector().getConnection();
			
			preparedStatementAtelier = dbConnection.prepareStatement(ListOfQueries.QUERY_ADD_ATELIER);
			preparedStatementAtelier.setString(1, req.getAttribute("titre").toString());
			preparedStatementAtelier.setString(2, req.getAttribute("theme").toString());
			preparedStatementAtelier.setInt(3, (int) req.getSession().getAttribute("idLabo"));
			preparedStatementAtelier.setInt(4, (int) req.getAttribute("duree"));
			preparedStatementAtelier.setInt(5, (int) req.getAttribute("capacite"));
			
			preparedStatementAtelier.executeUpdate();
			
			preparedStatementCreatedAtelier = dbConnection.prepareStatement(ListOfQueries.QUERY_GET_LAST_ATELIER);
			preparedStatementCreatedAtelier.setInt(1, (int) req.getSession().getAttribute("idLabo"));
			
			resultSetCreatedAtelier = preparedStatementCreatedAtelier.executeQuery();
			resultSetCreatedAtelier.next();
			idCreatedAtelier = resultSetCreatedAtelier.getInt("Id");
			
			preparedStatementHoraire = dbConnection.prepareStatement(ListOfQueries.QUERY_MODIFY_HORAIRE);
			preparedStatementHoraire.setBoolean(1, (boolean) req.getAttribute("lundi_m"));
			preparedStatementHoraire.setBoolean(2, (boolean) req.getAttribute("lundi_ap"));
			preparedStatementHoraire.setBoolean(3, (boolean) req.getAttribute("mardi_m"));
			preparedStatementHoraire.setBoolean(4, (boolean) req.getAttribute("mardi_ap"));
			preparedStatementHoraire.setBoolean(5, (boolean) req.getAttribute("mercredi_m"));
			preparedStatementHoraire.setBoolean(6, (boolean) req.getAttribute("mercredi_ap"));
			preparedStatementHoraire.setBoolean(7, (boolean) req.getAttribute("jeudi_m"));
			preparedStatementHoraire.setBoolean(8, (boolean) req.getAttribute("jeudi_ap"));
			preparedStatementHoraire.setBoolean(9, (boolean) req.getAttribute("vendredi_m"));
			preparedStatementHoraire.setBoolean(10, (boolean) req.getAttribute("vendredi_ap"));
			preparedStatementHoraire.setInt(11, idCreatedAtelier);
			
			preparedStatementHoraire.executeUpdate();
		}
		catch(NamingException | SQLException e){
			System.out.println(e.getClass().getName() + " : " + e.getMessage());
		}
		finally{
			try{
				if(resultSetAtelier != null){
					resultSetAtelier.close();
				}
				if(preparedStatementAtelier != null){
					preparedStatementAtelier.close();
				}
				if(resultSetHoraire != null){
					resultSetHoraire.close();
				}
				if(preparedStatementHoraire != null){
					preparedStatementHoraire.close();
				}
				if(dbConnection != null){
					dbConnection.close();
				}
			}
			catch(SQLException e){
				System.out.println(e.getClass().getName() + " : " + e.getMessage());
			}
		}
    	rd = req.getRequestDispatcher("/");
    	rd.forward(req, resp);
	}

}
