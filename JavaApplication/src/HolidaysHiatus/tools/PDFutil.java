/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.tools;

import HolidaysHiatus.tools.MyConnection;
import com.lowagie.text.Document;
import com.lowagie.text.DocumentException;
import com.lowagie.text.Element;
import com.lowagie.text.FontFactory;
import com.lowagie.text.Image;
import com.lowagie.text.Paragraph;
import com.lowagie.text.Phrase;
import com.lowagie.text.html.WebColors;
import com.lowagie.text.pdf.PdfPCell;
import com.lowagie.text.pdf.PdfPTable;
import com.lowagie.text.pdf.PdfWriter;
import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.entities.Board;
import HolidaysHiatus.entities.CategorieBoard;
import com.lowagie.text.pdf.PdfCell;

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
 * @author drwhoo
 */
public class PDFutil {

    Connection cn2;
    Statement ste;

    public PDFutil() {
        cn2 = MyConnection.getInstance().getCnx();
    }

    Document doc = new Document();

   

    public void listCategorieAide() throws SQLException, FileNotFoundException, DocumentException, IOException {
        ste = cn2.createStatement();
        ResultSet rs = ste.executeQuery("SELECT * from categorie_aide");
        PdfWriter.getInstance(doc, new FileOutputStream("./CategoriesAides.pdf"));

        doc.open();
        Image image = Image.getInstance("C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\logo.png");

        //document.add(new Paragraph("test\n  test")); 
        doc.add(image);
        doc.add(new Paragraph("   "));
        doc.add(new Paragraph("  Liste CategorieAide  "));
        doc.add(new Paragraph("   "));

        PdfPTable table = new PdfPTable(2);
        table.setWidthPercentage(100);
        PdfPCell cell;

        cell = new PdfPCell(new Phrase("Titre", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);

        table.addCell(cell);

        cell = new PdfPCell(new Phrase("Image", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);

        table.addCell(cell);

        while (rs.next()) {

            CategorieAide c = new CategorieAide();

            c.setTitre(rs.getString(2));
            c.setLien_icon(rs.getString(3));

            cell = new PdfPCell(new Phrase(c.getTitre(), FontFactory.getFont("Comic Sans MS", 12)));
            cell.setHorizontalAlignment(Element.ALIGN_CENTER);

            table.addCell(cell);
            Image image1 = Image.getInstance("C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\uploads\\" + c.getLien_icon());
            PdfPCell cell1 = new PdfPCell(image1, true);

            table.addCell(cell1);

        }

        doc.add(table);
        doc.close();
        Desktop.getDesktop().open(new File("./CategoriesAides.pdf"));
    }
      public void listAide() throws SQLException, FileNotFoundException, DocumentException, IOException {
        ste = cn2.createStatement();
        ResultSet rs = ste.executeQuery("SELECT * from aide");
        PdfWriter.getInstance(doc, new FileOutputStream("./Aides.pdf"));

        doc.open();
        Image image = Image.getInstance("C:\\Users\\drwhoo\\Desktop\\projet-webjava\\Projet3eme\\JavaApplication\\src\\HolidaysHiatus\\images\\logo.png");

        //document.add(new Paragraph("test\n  test")); 
        doc.add(image);
        doc.add(new Paragraph("   "));
        doc.add(new Paragraph("  Liste Aide  "));
        doc.add(new Paragraph("   "));

        PdfPTable table = new PdfPTable(5);
        table.setWidthPercentage(100);
        PdfPCell cell;
        
        cell = new PdfPCell(new Phrase("Titre", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        table.addCell(cell);

        cell = new PdfPCell(new Phrase("Description", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        table.addCell(cell);

        cell = new PdfPCell(new Phrase("Adresse", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        table.addCell(cell);

        cell = new PdfPCell(new Phrase("Telephone", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        table.addCell(cell);
        
        cell = new PdfPCell(new Phrase("Image", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        table.addCell(cell);

        while (rs.next()) {

            Aide a = new Aide();

            a.setTitre(rs.getString(3));
            a.setDescription(rs.getString(4));
            a.setAdresse(rs.getString(5));
            a.setNum_tell(rs.getString(6));
            a.setLien_image(rs.getString(7));
            
            cell = new PdfPCell(new Phrase(a.getTitre(), FontFactory.getFont("Comic Sans MS", 12)));
            cell.setHorizontalAlignment(Element.ALIGN_LEFT);
            table.addCell(cell);
            
            cell = new PdfPCell(new Phrase(a.getDescription(), FontFactory.getFont("Comic Sans MS", 12)));
            cell.setHorizontalAlignment(Element.ALIGN_LEFT);
            table.addCell(cell);
            
            cell = new PdfPCell(new Phrase(a.getAdresse(), FontFactory.getFont("Comic Sans MS", 12)));
            cell.setHorizontalAlignment(Element.ALIGN_LEFT);
            table.addCell(cell);
            
            cell = new PdfPCell(new Phrase(a.getNum_tell(), FontFactory.getFont("Comic Sans MS", 12)));
            cell.setHorizontalAlignment(Element.ALIGN_LEFT);
            table.addCell(cell);
            
            Image image1 = Image.getInstance("C:\\Users\\drwhoo\\Desktop\\Projet3eme\\SymfonyApplication\\public\\uploads\\" + a.getLien_image());
            PdfPCell cell1 = new PdfPCell(image1, true);

            table.addCell(cell1);

        }

        doc.add(table);
        doc.close();
        Desktop.getDesktop().open(new File("./Aides.pdf"));
    }
       public void listCategorieBoard() throws SQLException, FileNotFoundException, DocumentException, IOException {
        ste = cn2.createStatement();
        ResultSet rs = ste.executeQuery("SELECT * from categorie_board");
        PdfWriter.getInstance(doc, new FileOutputStream("./CategoriesBoard.pdf"));

        doc.open();
        Image image = Image.getInstance("C:\\Users\\AMINE\\Projet3eme\\SymfonyApplication\\public\\logo.png");

        //document.add(new Paragraph("test\n  test")); 
        doc.add(image);
        doc.add(new Paragraph("   "));
        doc.add(new Paragraph("  Liste CategorieBoard "));
        doc.add(new Paragraph("   "));

        PdfPTable table = new PdfPTable(2);
        table.setWidthPercentage(100);
        PdfPCell cell;

        cell = new PdfPCell(new Phrase("Titre", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);

        table.addCell(cell);

        cell = new PdfPCell(new Phrase("Image", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);

        table.addCell(cell);

        while (rs.next()) {

            CategorieBoard c = new CategorieBoard();

            c.setTitre(rs.getString(2));

            cell = new PdfPCell(new Phrase(c.getTitre(), FontFactory.getFont("Comic Sans MS", 12)));
            cell.setHorizontalAlignment(Element.ALIGN_CENTER);

            table.addCell(cell);
            Image image1 = Image.getInstance("C:\\Users\\AMINE\\Projet3eme\\SymfonyApplication\\public\\" + c.getPic());
            PdfPCell cell1 = new PdfPCell(image1, true);

            table.addCell(cell1);

        }

        doc.add(table);
        doc.close();
        Desktop.getDesktop().open(new File("./CategoriesBoard.pdf"));
    }
      public void listBoard() throws SQLException, FileNotFoundException, DocumentException, IOException {
        ste = cn2.createStatement();
        ResultSet rs = ste.executeQuery("SELECT * from board");
        PdfWriter.getInstance(doc, new FileOutputStream("./Boards.pdf"));

        doc.open();
        Image image = Image.getInstance("C:\\Users\\AMINE\\Projet3eme\\SymfonyApplication\\public\\logo.png");

        //document.add(new Paragraph("test\n  test")); 
        doc.add(image);
        doc.add(new Paragraph("   "));
        doc.add(new Paragraph("  Liste Board  "));
        doc.add(new Paragraph("   "));

        PdfPTable table = new PdfPTable(3);
        table.setWidthPercentage(100);
        PdfPCell cell;
        
        cell = new PdfPCell(new Phrase("Titre", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        table.addCell(cell);
cell = new PdfPCell(new Phrase("Nombre de vue", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        table.addCell(cell);

     
        cell = new PdfPCell(new Phrase("Image", FontFactory.getFont("Comic Sans MS", 15)));
        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
        table.addCell(cell);

        while (rs.next()) {

            Board a = new Board();

            a.setTitre(rs.getString(3));
       
            a.setNbr_vue(rs.getInt(6));
            a.setPic(rs.getString(4));
            
            cell = new PdfPCell(new Phrase(a.getTitre(), FontFactory.getFont("Comic Sans MS", 12)));
            cell.setHorizontalAlignment(Element.ALIGN_LEFT);
            table.addCell(cell);
            
            cell = new PdfPCell(new Phrase(Integer.toString(a.getNbr_vue()), FontFactory.getFont("Comic Sans MS", 12)));
            cell.setHorizontalAlignment(Element.ALIGN_LEFT);
            table.addCell(cell);
            
            Image image1 = Image.getInstance("C:\\Users\\AMINE\\Projet3eme\\SymfonyApplication\\public\\" + a.getPic());
            PdfPCell cell1 = new PdfPCell(image1, true);

            table.addCell(cell1);

        }

        doc.add(table);
        doc.close();
        Desktop.getDesktop().open(new File("./Boards.pdf"));
    }
     

}
