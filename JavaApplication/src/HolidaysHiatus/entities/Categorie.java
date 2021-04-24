/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entities;

/**
 *
 * @author DELL
 */
public class Categorie {
    private Integer id ;
    private String nom ;
    private Integer id_board;

    public Integer getId_board() {
        return id_board;
    }

    public Categorie(Integer id, String nom, Integer id_board) {
        this.id = id;
        this.nom = nom;
        this.id_board = id_board;
    }
    

    public void setId_board(Integer id_board) {
        this.id_board = id_board;
    }
    

    public Categorie(Integer id, String nom) {
        this.id = id;
        this.nom = nom;
    }

    public Categorie(String nom) {
        this.nom = nom;
    }

    public Categorie() {
    }

    public Integer getId() {
        return id;
    }

    public String getNom() {
        return nom;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }


    
}
