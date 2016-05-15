<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Video module for xoops
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        video
 * @since          1.0
 * @min_xoops      2.5.7
 * @author         Txmod Xoops - Email:<info@txmodxoops.org> - Website:<http://txmodxoops.org>
 * @version        $Id: 1.0 admin.php 14050 Sat 2016-05-07 14:43:59Z Timgno $
 */
// ---------------- Admin Index ----------------
define('_AM_VIDEO_STATISTICS', "Statistiche");
// Ci sono
define('_AM_VIDEO_THEREARE_CATEGORIES', "Ci sono <span class='bold'>%s</span> categorie nel database");
define('_AM_VIDEO_THEREARE_VIDEOS', "Ci sono <span class='bold'>%s</span> video nel database");
// ---------------- ---------------- File Admin
// Non sono
define('_AM_VIDEO_THEREARENT_CATEGORIES', "Non ci sono categorie");
define('_AM_VIDEO_THEREARENT_VIDEOS', "Non ci sono video");
// Salva / Elimina
define('_AM_VIDEO_FORM_OK', "Salvato con successo");
define('_AM_VIDEO_FORM_DELETE_OK', "Cancellato con successo");
define('_AM_VIDEO_FORM_SURE_DELETE', "Sei sicuro di voler eliminare: <b><span style='color: red;'>%s</span></b>");
define('_AM_VIDEO_FORM_SURE_RENEW', "Sei sicuro di aggiornare: <b><span style='color: red;'>%s</span></b>");
// Bottoni
define('_AM_VIDEO_ADD_CATEGORY', "Aggiungi nuova categoria");
define('_AM_VIDEO_ADD_VIDEO', "Aggiungere un nuovo video");
// liste
define('_AM_VIDEO_CATEGORIES_LIST', "Elenco delle categorie");
define('_AM_VIDEO_VIDEOS_LIST', "Elenco dei video");
// ---------------- ---------------- Classi Admin
// Categoria Add / Edit
define('_AM_VIDEO_CATEGORY_ADD', "Aggiungi Categoria");
define('_AM_VIDEO_CATEGORY_EDIT', "Modifica categoria");
// Elementi di Categoria
define('_AM_VIDEO_CATEGORY_ID', "ID");
define('_AM_VIDEO_CATEGORY_PID', "Categorie");
define('_AM_VIDEO_CATEGORY_TITLE', "Title");
define('_AM_VIDEO_CATEGORY_DESCRIPTION', "Descrizione");
define('_AM_VIDEO_CATEGORY_IMAGE', "Immagine");
define('_AM_VIDEO_FORM_IMAGE_LIST_CATEGORIES', "Carica Immagine");
define('_AM_VIDEO_CATEGORY_WEIGHT', "Ordine");
// Video Aggiungi / Modifica
define('_AM_VIDEO_VIDEO_ADD', "Aggiungi video");
define('_AM_VIDEO_VIDEO_EDIT', "Modifica video");
// Elementi di Video
define('_AM_VIDEO_VIDEO_ID', "ID");
define('_AM_VIDEO_VIDEO_CID', "Categorie");
define('_AM_VIDEO_VIDEO_TITLE', "Titolo");
define('_AM_VIDEO_VIDEO_FILE', "File");
define('_AM_VIDEO_FORM_UPLOAD_FILE_VIDEOS', "Carica Video");
define('_AM_VIDEO_FORM_UPLOAD_FILE_VIDEOS_DESC', "<b class=\"red\">ATTENZIONE</b>: I formati video supportati sono (MP4, OGG, MPEG),<br />se si ha un formato diverso,<br />&egrave; opportuno convertirlo in uno di questi formati supportati.");
define('_AM_VIDEO_VIDEO_DESCRIPTION', "Descrizione");
define('_AM_VIDEO_VIDEO_URL', "URL");
define('_AM_VIDEO_VIDEO_CREATED', "Creazione");
define('_AM_VIDEO_VIDEO_PUBLISHED', "Pubblicato");
define('_AM_VIDEO_VIDEO_WEIGHT', "Ordine");
define('_AM_VIDEO_VIDEO_DISPLAY', "Visualizzare?");
define('_AM_VIDEO_FORM_NOVIDEOS', "Devi caricare un file oppure inserire un url");
// generale
define('_AM_VIDEO_FORM_UPLOAD', "Carica file");
define('_AM_VIDEO_FORM_IMAGE_PATH', "File in %s");
define('_AM_VIDEO_FORM_ACTION', "Azione");
define('_AM_VIDEO_FORM_EDIT', "Modifica");
define('_AM_VIDEO_FORM_DELETE', "Cancella");
// ---------------- ---------------- Autorizzazioni di amministratore
// Permessi
define('_AM_VIDEO_PERMISSIONS_GLOBAL', "Autorizzazioni globali");
define('_AM_VIDEO_PERMISSIONS_GLOBAL_DESC', "Autorizzazioni globali per controllare il tipo di.");
define('_AM_VIDEO_PERMISSIONS_GLOBAL_4', "Autorizzazioni globale per l'approvazione");
define('_AM_VIDEO_PERMISSIONS_GLOBAL_8', "Autorizzazioni globale di presentare");
define('_AM_VIDEO_PERMISSIONS_GLOBAL_16', "autorizzazioni globali per visualizzare");
define('_AM_VIDEO_PERMISSIONS_APPROVE', "Autorizzazioni per l'approvazione");
define('_AM_VIDEO_PERMISSIONS_APPROVE_DESC', "Autorizzazioni per l'approvazione");
define('_AM_VIDEO_PERMISSIONS_SUBMIT', "Autorizzazioni di presentare");
define('_AM_VIDEO_PERMISSIONS_SUBMIT_DESC', "Autorizzazioni di presentare");
define('_AM_VIDEO_PERMISSIONS_VIEW', "Autorizzazioni per visualizzare");
define('_AM_VIDEO_PERMISSIONS_VIEW_DESC', "Autorizzazioni per visualizzare");
define('_AM_VIDEO_NO_PERMISSIONS_SET', "No set di autorizzazioni");
// ---------------- ---------------- Admin Altri
define('_AM_VIDEO_MAINTAINEDBY', "viene mantenuto da");
// ---------------- End ----------------