/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.entities.NoteAide;
import HolidaysHiatus.tools.Statics;
import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.JSONParser;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.ui.events.ActionListener;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

/**
 *
 * @author drwhoo
 */
public class AideService {
       public ArrayList<Aide> aides;

    public static AideService instance ;
    //private ConnectionRequest req ;
    
    /*public AideService()
    { req = new ConnectionRequest();
    }*/
    
    public boolean resultOK;
 
     public static AideService getInstance() {
        if (instance == null) {
            instance = new AideService();
        }
        return instance;
    }

 public ArrayList<Aide> parseAides(String jsonText){
        try {
            aides=new ArrayList<>();
            JSONParser j = new JSONParser();
            Map<String,Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));
            
            List<Map<String,Object>> list = (List<Map<String,Object>>)tasksListJson.get("root");
            for(Map<String,Object> obj : list){
                Aide a = new Aide();
                a.setId(((int)Float.parseFloat( obj.get("id").toString())));
                a.setTitre(obj.get("titre").toString());
                a.setDescription(obj.get("description").toString());
                a.setAdresse(obj.get("adresse").toString());
                a.setNum_tell(obj.get("num_tell").toString());
                a.setLien_image(obj.get("lien_image").toString());
                a.setMoyenne(Float.parseFloat(obj.get("moyenne").toString()));
                a.setValeur(Float.parseFloat(obj.get("note").toString()));
                a.setAvis(obj.get("avis").toString());
                a.setCategorie_titre(obj.get("categorie_titre").toString());
               
                aides.add(a);
            }
            
        } catch (IOException ex) {
            
        }
        return aides;
    }
       public ArrayList<Aide> getAllAides(int id ,int iduser){
        
        String url = Statics.BASE_URL_Aide + "/Afficher/"+id+"/"+iduser ;
     
         ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                aides = parseAides(new String(req.getResponseData()));
                 
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);

        return aides;
    }
       public Boolean addNote(NoteAide n ,int iduser,int idsoin) {
     
        
               
     
        String url = Statics.BASE_URL_Note + "/Ajouter" + "/"+ idsoin + "/"+iduser + "/"+ n.getValeur()+"/"+ n.getAvis();
    
   
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this);
            }
        });
        
        NetworkManager.getInstance().addToQueueAndWait(req);
   
    
    
    return resultOK; 
}

        public Boolean addAide(String titre ,String Description,String adresse,String telephone,int categorie,String ImageData) {
     
        
               
     
        String url = Statics.BASE_URL_Aide + "/Ajouter" + "/"+ titre + "/"+Description + "/"+ adresse+"/"+ telephone +"/"+ categorie +"/" + ImageData;
    
   
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this);
            }
        });
        
        NetworkManager.getInstance().addToQueueAndWait(req);
   
    
    
    return resultOK; 
  } 
           public Boolean updateAide(int id ,String titre ,String Description,String adresse,String telephone,int categorie,String ImageData) {
     
        
               
     
        String url = Statics.BASE_URL_Aide + "/Modifier" +"/"+ id + "/"+ titre + "/"+Description + "/"+ adresse+"/"+ telephone +"/"+ categorie+ "/" + ImageData;
    
   
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this);
            }
        });
        
        NetworkManager.getInstance().addToQueueAndWait(req);
   
    
    
    return resultOK; 
  } 
       public ArrayList<Aide> getAllAidesBack(){
        
        String url = Statics.BASE_URL_Aide + "/Afficher";

         ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                aides = parseAides(new String(req.getResponseData()));
           req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);

        return aides;
    }
       
       public Boolean deleteAide(int id) {
        String url = Statics.BASE_URL_Aide + "/supprimer" + "/"+ id;
    
   
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this);
            }
        });
        
        NetworkManager.getInstance().addToQueueAndWait(req);
    return resultOK; 
}
        
       public ArrayList<Aide>statdata() {
        
        String url = Statics.BASE_URL_Aide + "/Stat";
         
   
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                aides = parseStat(new String(req.getResponseData()));
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this);
            }
        });
        
        NetworkManager.getInstance().addToQueueAndWait(req);

    return aides; 
  } 
  public ArrayList<Aide> parseStat(String jsonText){
        try {
            aides=new ArrayList<>();
            JSONParser j = new JSONParser();
            Map<String,Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));
            
            List<Map<String,Object>> list = (List<Map<String,Object>>)tasksListJson.get("root");
            for(Map<String,Object> obj : list){
                Aide s = new Aide();
                
             
                s.setTitre(obj.get("titre").toString());
        
                s.setMoyenne(Float.parseFloat(obj.get("moyenne").toString()));
       
                aides.add(s);
            }
            
        } catch (IOException ex) {
            
        }
        return aides;
            }

}
