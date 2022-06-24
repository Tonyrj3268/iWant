# iWant-租借二手物網站

## 介紹
* 初次架設網站，使用一個伺服器語言連接網站和連結資料庫<br> 
* 使用語言和技術:HTML、CSS、JS、JQuery、PHP、MYSQL<br> 
* 面臨挑戰和未解決問題:JS、PHP和MYSQL間的互動不熟悉、SQL INJECTION等攻擊問題<br> 
* 本文為作者第一次嘗試撰寫readme文章，若內容有所錯誤或資訊不堪，請見諒<br> 

## 如何安裝項目
1.安裝合適的IDE，這裡作者選用[Visual Studio Code](https://code.visualstudio.com/)，因為這軟體有大量插件可以幫助程式的撰寫<br> 
2.安裝適用php的伺服器環境，這裡選用[Xampp集成軟體](https://www.apachefriends.org/zh_tw/download.html)，可以幫助安裝php環境更加順利<br> 
3.安裝資料庫，這裡選擇[MySQL Workbench](https://www.mysql.com/products/workbench/)，和php有著極高的向性<br> 
4-1.從Moodle附加檔案中下載iWant<br> 
4-2.或從github下載iWant<br> 

## 如何運行項目
1.IDE配置PHP環境，[參考資料點此](https://blog.csdn.net/qq_44803335/article/details/108806851?spm=1001.2101.3001.6650.2&utm_medium=distribute.pc_relevant.none-task-blog-2%7Edefault%7ECTRLIST%7Edefault-2-108806851-blog-105386550.pc_relevant_blogantidownloadv1&depth_1-utm_source=distribute.pc_relevant.none-task-blog-2%7Edefault%7ECTRLIST%7Edefault-2-108806851-blog-105386550.pc_relevant_blogantidownloadv1&utm_relevant_index=4)<br> 
2.IDE開啟iWant檔案<br> 
3.在php資料夾中，找到connect.php，並且將servername、db_username和db_password更改成您的MySQL Workbench的對應帳號密碼<br> 
4.在index.php檔案中右鍵點選Serve project開啟伺服器<br> 
5.導入sql資料和相關架構到MySQL Workbench，[參考資料點此](https://blog.csdn.net/LENOVOJXN/article/details/105507148)<br> 

## 可能出現問題
1.無法連線資料庫:請檢查是否有在connect.php中更改帳號密碼的設置<br> 
2.無法找到資料庫資料:由於php語言的不熟悉，新創帳號可能無法通過php設置的一些限制，例如商品價格或數量，建議導入附加檔案中的sql檔案幫助開啟(限資料庫管理課程助教和老師和同學)<br> 
3.伺服器環境設置問題:請檢查是否導入相關插件或環境配置<br> 
## 無法下載但想嘗試
若您碰上上面可能問題，或是其他Bug，但您仍然想進行體驗，請聯繫作者，作者可和您約時間並且由作者方開啟ngork，來讓您短暫連至作者本機網站(限資料庫管理課程助教、老師和同學)。

## 作者信箱:109306066@nccu.edu.tw
