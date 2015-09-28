package projet_cp;

import java.io.*;

public class Horaire implements Serializable {
	int Id;
	boolean Lundi_m;
	boolean Lundi_ap;
	boolean Mardi_m;
	boolean Mardi_ap;
	boolean Mercredi_m;
	boolean Mercredi_ap;
	boolean Jeudi_m;
	boolean Jeudi_ap;
	boolean Vendredi_m;
	boolean Vendredi_ap;
	Atelier IdAtelier;
	
	public Horaire(int id, boolean lundi_m, boolean lundi_ap, boolean mardi_m, boolean mardi_ap, boolean mercredi_m,
			boolean mercredi_ap, boolean jeudi_m, boolean jeudi_ap, boolean vendredi_m, boolean vendredi_ap,
			Atelier idAtelier) {
		super();
		Id = id;
		Lundi_m = lundi_m;
		Lundi_ap = lundi_ap;
		Mardi_m = mardi_m;
		Mardi_ap = mardi_ap;
		Mercredi_m = mercredi_m;
		Mercredi_ap = mercredi_ap;
		Jeudi_m = jeudi_m;
		Jeudi_ap = jeudi_ap;
		Vendredi_m = vendredi_m;
		Vendredi_ap = vendredi_ap;
		IdAtelier = idAtelier;
	}

	public void setId( int id ){
		this.Id = id;
	}
	
	public void setLundi_m( boolean lm ){
		this.Lundi_m = lm;
	}
	
	public void setLundi_ap( boolean lap ){
		this.Lundi_ap = lap;
	}
	
	public void setMardi_m( boolean mam ){
		this.Mardi_m = mam;
	}
	
	public void setMardi_ap( boolean maap ){
		this.Mardi_ap = maap;
	}
	
	public void setMercredi_m( boolean mem ){
		this.Mercredi_m = mem;
	}
	
	public void setMercredi_ap( boolean meap ){
		this.Mercredi_ap = meap;
	}
	
	public void setJeudi_m( boolean jm ){
		this.Jeudi_m = jm;
	}
	
	public void setJeudi_ap( boolean jap ){
		this.Jeudi_ap = jap;
	}
	
	public void setVendredi_m( boolean vm ){
		this.Vendredi_m = vm;
	}
	
	public void setVendredi_ap( boolean vap ){
		this.Vendredi_ap = vap;
	}
	
	public void setIdAtelier( Atelier idatelier ){
		this.IdAtelier = idatelier;
	}
	
	public int getId(){
		return this.Id;
	}
	
	public boolean getLundi_m(){
		return this.Lundi_m;
	}
	
	public boolean getLundi_ap(){
		return this.Lundi_ap;
	}
	
	public boolean getMardi_m(){
		return this.Mardi_m;
	}
	
	public boolean getMardi_ap(){
		return this.Mardi_ap;
	}
	
	public boolean getMercredi_m(){
		return this.Mercredi_m;
	}
	
	public boolean getMercredi_ap(){
		return this.Mercredi_ap;
	}
	
	public boolean getJeudi_m(){
		return this.Jeudi_m;
	}
	
	public boolean getJeudi_ap(){
		return this.Jeudi_ap;
	}
	
	public boolean getVendredi_m(){
		return this.Vendredi_m;
	}
	
	public boolean getVendredi_ap(){
		return this.Vendredi_ap;
	}
	
	public Atelier setIdAtelier(){
		return this.IdAtelier;
	}
}
