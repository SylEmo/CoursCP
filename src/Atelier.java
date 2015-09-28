package projet_cp;

import java.io.*;

public class Atelier implements Serializable {
	int Id;
	String Titre;
	String Theme;
	Laboratoire Labo;
	int Duree;
	int Capacite;
	
	public void setId( int id ){
		this.Id = id;
	}
	
	public void setTitre( String titre ){
		this.Titre = titre;
	}
	
	public void setTheme( String theme ){
		this.Theme = theme;
	}
	
	public void setLabo( Laboratoire labo ){
		this.Labo = labo;
	}
	
	public void setDuree( int duree ){
		this.Duree = duree;
	}
	
	public void setCapacite( int capacite ){
		this.Capacite = capacite;
	}
	
	public int getId(){
		return this.Id;
	}
	
	public String getTitre(){
		return this.Titre;
	}
	
	public String getTheme(){
		return this.Theme;
	}
	
	public Laboratoire getLabo(){
		return this.Labo;
	}
	
	public int getDuree(){
		return this.Duree;
	}
	
	public int getCapacite(){
		return this.Capacite;
	}
}
