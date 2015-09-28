package projet_cp;

import java.io.*;

public class Laboratoire implements Serializable{
	int Id;
	String Nom;
	String Lieu;
	
	public Laboratoire(int id, String nom, String lieu) {
		super();
		Id = id;
		Nom = nom;
		Lieu = lieu;
	}
	
	public void setId( int id ){
		this.Id = id;
	}
	
	public void setNom( String nom ){
		this.Nom = nom;
	}

	public void setLieu( String lieu ){
		this.Lieu = lieu;
	}
	
	public int getId(){
		return this.Id;
	}
	
	public String getNom(){
		return this.Nom;
	}
	
	public String getLieu(){
		return this.Lieu;
	}
}
