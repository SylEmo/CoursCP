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
			preparedStatementAtelier.setString(1, req.getParameter("titre"));
			preparedStatementAtelier.setString(2, req.getParameter("theme"));
			preparedStatementAtelier.setInt(3, (int) req.getSession().getAttribute("idLabo"));
			preparedStatementAtelier.setInt(4, Integer.parseInt(req.getParameter("duree")));
			preparedStatementAtelier.setInt(5, Integer.parseInt(req.getParameter("capacite")));
			
			preparedStatementAtelier.executeUpdate();
			
			preparedStatementCreatedAtelier = dbConnection.prepareStatement(ListOfQueries.QUERY_GET_LAST_ATELIER);
			preparedStatementCreatedAtelier.setInt(1, (int) req.getSession().getAttribute("idLabo"));
			
			resultSetCreatedAtelier = preparedStatementCreatedAtelier.executeQuery();
			resultSetCreatedAtelier.next();
			idCreatedAtelier = resultSetCreatedAtelier.getInt("Id");
			
			preparedStatementHoraire = dbConnection.prepareStatement(ListOfQueries.QUERY_MODIFY_HORAIRE);
			String[] listeCreneaux = req.getParameterValues("creneaux");
			
			preparedStatementHoraire.setString(1, req.getParameter("lundi_m"));
			preparedStatementHoraire.setString(2, req.getParameter("lundi_ap"));
			preparedStatementHoraire.setString(3, req.getParameter("mardi_m"));
			preparedStatementHoraire.setString(4, req.getParameter("mardi_ap"));
			preparedStatementHoraire.setString(5, req.getParameter("mercredi_m"));
			preparedStatementHoraire.setString(6, req.getParameter("mercredi_ap"));
			preparedStatementHoraire.setString(7, req.getParameter("jeudi_m"));
			preparedStatementHoraire.setString(8, req.getParameter("jeudi_ap"));
			preparedStatementHoraire.setString(9, req.getParameter("vendredi_m"));
			preparedStatementHoraire.setString(10, req.getParameter("vendredi_ap"));
			preparedStatementHoraire.setInt(11, idCreatedAtelier);
			
			preparedStatementHoraire.executeUpdate();
		}
		catch(NamingException | SQLException e){
			System.out.println(e.getClass().getName() + " : " + e.getMessage());
		}
		finally{
			try{
				if(resultSetCreatedAtelier != null){
					resultSetCreatedAtelier.close();
				}
				if(preparedStatementAtelier != null){
					preparedStatementAtelier.close();
				}
				if(preparedStatementCreatedAtelier != null){
					preparedStatementCreatedAtelier.close();
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
