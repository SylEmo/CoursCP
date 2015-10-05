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
@WebServlet("/detail-atelier")
public class DétailAtelierServlet extends HttpServlet {

	/* (non-Javadoc)
	 * @see javax.servlet.http.HttpServlet#doGet(javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
	 */
	@Override
	protected void doGet(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		RequestDispatcher rd = null;
		Connection dbConnection = null;
		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		int idAtelier = Integer.parseInt(req.getParameter("idAtelier"));
		
		try{
			dbConnection = new DatabaseConnector().getConnection();
			preparedStatement = dbConnection.prepareStatement(ListOfQueries.QUERY_GET_DETAILS_ATELIER);
			preparedStatement.setInt(1, idAtelier);
			
			resultSet = preparedStatement.executeQuery();
			resultSet.next();
			
			Laboratoire laboratoire = new Laboratoire((int) req.getSession().getAttribute("idLabo"), 
					resultSet.getString("nom"), resultSet.getString("lieu"));
			Atelier atelier = new Atelier(idAtelier, resultSet.getString("titre"),
					resultSet.getString("theme"), laboratoire, resultSet.getInt("duree"),
					resultSet.getInt("capacite"));
			Horaire horaire = new Horaire(resultSet.getInt("id"), resultSet.getBoolean("lundi_m"), resultSet.getBoolean("lundi_ap"), 
					resultSet.getBoolean("mardi_m"), resultSet.getBoolean("mardi_ap"), 
					resultSet.getBoolean("mercrendi_m"), resultSet.getBoolean("mercredi_ap"),
					resultSet.getBoolean("jeudi_m"), resultSet.getBoolean("jeudi_ap"),
					resultSet.getBoolean("vendredi_m"), resultSet.getBoolean("vendredi_ap"), atelier);
			
			req.setAttribute("atelier", atelier);
			req.setAttribute("laboratoire", laboratoire);
			req.setAttribute("horaire", horaire);
		}
		catch(NamingException | SQLException e){
			System.out.println(e.getClass().getName() + " : " + e.getMessage());
		}
		finally{
			try{
				if(resultSet != null){
					resultSet.close();
				}
				if(preparedStatement != null){
					preparedStatement.close();
				}
				if(dbConnection != null){
					dbConnection.close();
				}
			}
			catch(SQLException e){
				System.out.println(e.getClass().getName() + " : " + e.getMessage());
			}
		}
    	rd = req.getRequestDispatcher("/WEB-INF/details-atelier.jsp");
    	rd.forward(req, resp);
	}

	/* (non-Javadoc)
	 * @see javax.servlet.http.HttpServlet#doPost(javax.servlet.http.HttpServletRequest, javax.servlet.http.HttpServletResponse)
	 */
	@Override
	protected void doPost(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		doGet(req, resp);
	}

}
