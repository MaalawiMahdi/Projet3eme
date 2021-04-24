/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.tools;

import HolidaysHiatus.entities.ProduitService;
import com.itextpdf.text.Document;
import com.itextpdf.text.DocumentException;
import com.itextpdf.text.Element;
import com.itextpdf.text.FontFactory;
import com.itextpdf.text.Image;
import com.itextpdf.text.Paragraph;
import com.itextpdf.text.Phrase;
import com.itextpdf.text.pdf.PdfPCell;
import com.itextpdf.text.pdf.PdfPTable;
import com.itextpdf.text.pdf.PdfWriter;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;


import java.sql.Connection;
import java.sql.PreparedStatement;
import java.awt.Color;
import java.awt.Desktop;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.Time;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import javafx.scene.control.Cell;

/**
 *
 * @author DELL
 */
public class Pdf {
     Connection cnx;
    PreparedStatement ste;

    public Pdf() {
        cnx=Connexion.getInstance().getConnexion();

    } 
    
    Document doc = new Document();

   

    public void listCategorieAide() throws SQLException, FileNotFoundException, DocumentException, IOException {
        try{
       String requete = "SELECT * FROM produit_service where board_id=?" ;
      ste=cnx.prepareStatement(requete);
      }catch (SQLException ex) {
        
        System.out.println(ex.getMessage());
    }
        //String sql="insert into categorie_produit_service values(NULL,?,?)";

     
        ResultSet rs = ste.executeQuery("SELECT * from produit_service");
        PdfWriter.getInstance(doc, new FileOutputStream("./produit.pdf"));

        doc.open();
        //Image image = Image.getInstance("C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\logo.png");

        //document.add(new Paragraph("test\n  test")); 
       // doc.add(image);
        doc.add(new Paragraph("   "));
        doc.add(new Paragraph("  Liste produit  "));
        doc.add(new Paragraph("   "));

        PdfPTable table = new PdfPTable(4);
        table.setWidthPercentage(100);
        PdfPCell cell;

      cell = new PdfPCell(new Phrase("Titre", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        table.addCell(cell);

        cell = new PdfPCell(new Phrase("Description", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        table.addCell(cell);

        cell = new PdfPCell(new Phrase("Type", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        table.addCell(cell);

        //cell = new PdfPCell(new Phrase("Prix", FontFactory.getFont("Comic Sans MS", 15)));
        //cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        //table.addCell(cell);
        
       

      

        while (rs.next()) {

            ProduitService c = new ProduitService ();

            //c.setTitre(rs.getString(2));
          //  c.setLien_icon(rs.getString(3));
 c.setTitre(rs.getString(4));
 
            c.setDescription(rs.getString(5));
            c.setType(rs.getString(7)) ;
           //c.setPrix_unitaire(rs.getFloat(8)) ;
           
            
            cell = new PdfPCell(new Phrase(c.getTitre(), FontFactory.getFont("Comic Sans MS", 12)));
            cell.setHorizontalAlignment(Element.ALIGN_LEFT);
            table.addCell(cell);
            
            cell = new PdfPCell(new Phrase(c.getDescription(), FontFactory.getFont("Comic Sans MS", 12)));
            cell.setHorizontalAlignment(Element.ALIGN_LEFT);
            table.addCell(cell);
            
            cell = new PdfPCell(new Phrase(c.getType(), FontFactory.getFont("Comic Sans MS", 12)));
            cell.setHorizontalAlignment(Element.ALIGN_LEFT);
            table.addCell(cell);
            

            table.addCell(cell);
            

         //   table.addCell(cell1);

        }

        doc.add(table);
        doc.close();
        Desktop.getDesktop().open(new File("./produit.pdf"));
    }
}
