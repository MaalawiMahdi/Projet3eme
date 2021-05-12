package HolidaysHiatus.services;
import java.util.ArrayList;
import java.util.Map;

import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.JSONParser;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.ui.events.ActionListener;

import java.io.IOException;
import java.util.*;


import HolidaysHiatus.entities.*;
import HolidaysHiatus.tools.Statics;

public class BoardService {


    public ArrayList<Board> boards;

    public static BoardService instance;
    //private ConnectionRequest req ;

    /*public AideService()
    { req = new ConnectionRequest();
    }*/
    public boolean resultOK;

    public static BoardService getInstance() {
        if (instance == null) {
            instance = new BoardService();
        }
        return instance;
    }

    public ArrayList<Board> parseBoard(String jsonText) {
        try {
            boards = new ArrayList<>();
            JSONParser j = new JSONParser();
            Map<String, Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));

            List<Map<String, Object>> list = (List<Map<String, Object>>) tasksListJson.get("root");
            for (Map<String, Object> obj : list) {
                Board b = new Board();
                b.setId(((int) Float.parseFloat(obj.get("id").toString())));
                b.setCategorie_id(((int) Float.parseFloat(obj.get("categorie_id").toString())));

                // c.setBoard_id(((int) Float.parseFloat(obj.get("board_id").toString())));
                b.setTitre(obj.get("titre").toString());
                b.setPic(obj.get("pic").toString());

                boards.add(b);
            }

        } catch (IOException ex) {
            ex.getMessage();

        }
        return boards;
    }

    public ArrayList<Board> getBoardParCategorie(int i) {

        String url = Statics.BASE_URL_Board + "/AfficherBoardMobile/" + i;
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                boards = parseBoard(new String(req.getResponseData()));
                for (Board a : boards) {
                    System.out.println(a);
                }

                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        System.out.println(boards);
        return boards;
    }
    public void AjouterBoard(Board b) {	
        String url = Statics.BASE_URL_Board + "/AjouterBoardMobile/" + b.getTitre() + "/" + b.getCategorie_id()+"/"+b.getPic();
        
        System.out.print(url);
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);

    }
    public void ModifierBoard(Board b) {	
        String url = Statics.BASE_URL_Board + "/ModifierBoardMobile/" + b.getTitre() + "/" + b.getCategorie_id()+"/"+b.getPic()+"/"+b.getId();
        
        System.out.print(url);
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);

    }
    public void SupprimerBoard(Board b) {	
        String url = Statics.BASE_URL_Board + "/SupprimerBoardMobile/" +b.getId();
        
        System.out.print(url);
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);

    }
    public int getCnbr(int i) {
    	
    	int j=0;
    	ArrayList<Board> List=getBoardParCategorie(i);
    	
                for (Board a : List) {
j++;                }
return j;
    }
}
