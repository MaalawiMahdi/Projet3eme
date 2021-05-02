/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entities;

/**
 *
 * @author ASUS
 */
public class User {
    private int id;
    private String password;
    private String mail;
    private String type;
    private boolean active;
    private boolean ban; 

    public User() {
    }

    public User(String mail,String password ) {
        this.password = password;
        this.mail = mail;
    }

    public User(String password, String type, String mail, boolean active, boolean ban) {
        this.password = password;
        this.mail = mail;
        this.type = type;
        this.active = active;
        this.ban = ban;
    }

    public User(int id, String password,String type, String mail ) {
        this.id = id;
        this.password = password;
        this.mail = mail;
        this.type = type;
        this.active=true;
        this.ban=false;
        
    }

    public User(int id, String password,String type, String mail, boolean active, boolean ban) {
        this.id = id;
        this.password = password;
        this.mail = mail;
        this.type = type;
        this.active = active;
        this.ban = ban;
    }
    

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getMail() {
        return mail;
    }

    public void setMail(String mail) {
        this.mail = mail;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public boolean isActive() {
        return active;
    }

    public void setActive(boolean active) {
        this.active = active;
    }

    public boolean isBan() {
        return ban;
    }

    public void setBan(boolean ban) {
        this.ban = ban;
    }

 
    
    @Override
    public String toString() {
        return "User{" + "id=" + id + ", password=" + password + ", mail=" + mail + ", type=" + type + ", active=" + active + ", ban=" + ban + '}';
    }
    
    
}
