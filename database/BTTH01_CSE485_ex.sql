--a.
SELECT baiviet.tieude FROM baiviet JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE theloai.ten_tloai LIKE N'Nhạc trữ tình'
--b.
SELECT baiviet.tieude FROM baiviet JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia WHERE tacgia.ten_tgia LIKE N'Nhacvietplus'
--c.
SELECT theloai.ten_tloai FROM theloai JOIN baiviet ON baiviet.ma_tloai = theloai.ma_tloai WHERE baiviet.noidung IS NULL GROUP BY theloai.ten_tloai;
--d.
SELECT baiviet.ma_bviet,tieude, ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, ngayviet FROM baiviet JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;
--e.
SELECT theloai.ten_tloai from theloai JOIN baiviet on theloai.ma_tloai = baiviet.ma_tloai GROUP by theloai.ma_tloai ORDER by COUNT(baiviet.ma_bviet) DESC LIMIT 1;
--f.
SELECT tacgia.ten_tgia FROM tacgia JOIN baiviet ON tacgia.ma_tgia = baiviet.ma_bviet GROUP BY tacgia.ma_tgia ORDER BY COUNT(baiviet.ma_bviet) DESC LIMIT 2
--g.
SELECT tieude FROM baiviet WHERE ten_bhat LIKE N'%yêu%' OR ten_bhat LIKE N'%thương%' OR ten_bhat LIKE N'%anh%' OR ten_bhat LIKE N'%em%'
--h.
SELECT tieude FROM baiviet WHERE ten_bhat LIKE N'%yêu%' OR ten_bhat LIKE N'%thương%' OR ten_bhat LIKE N'%anh%' OR ten_bhat LIKE N'%em%' OR tieude LIKE N'%yêu%' OR tieude LIKE N'%thương%' OR tieude LIKE N'%anh%' OR tieude LIKE N'%em%';
--i.
CREATE VIEW vw_Music AS SELECT ma_bviet, tieude, ten_bhat, theloai.ten_tloai, tomtat, noidung, tacgia.ten_tgia, ngayviet, hinhanh FROM baiviet JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
--j.


DELIMITER //

CREATE PROCEDURE sp_DSBaiViet (
    IN ten_tloai_input VARCHAR(255)
)
BEGIN

    DECLARE ma_tloai_exists INT;

    SELECT COUNT(*)
    INTO ma_tloai_exists
    FROM theloai
    WHERE ten_tloai = ten_tloai_input;


    IF ma_tloai_exists = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Thể loại không tồn tại!';
    ELSE
        
        SELECT 
            ma_bviet,
            tieude,
            ten_bhat,
            ten_tloai,
            ten_tgia,
            tomtat,
            noidung,
            ngayviet,
            hinhanh
        FROM 
            vw_Music
        WHERE 
            ten_tloai = ten_tloai_input;
    END IF;
END //

DELIMITER ;

--k.
ALTER TABLE theloai ADD COLUMN SLBaiViet INT DEFAULT 0;

--
DELIMITER //

CREATE TRIGGER tg_CapNhatTheLoai_AfterDelete
AFTER DELETE ON baiviet
FOR EACH ROW
BEGIN

    UPDATE theloai
    SET SLBaiViet = (
        SELECT COUNT(*)
        FROM baiviet
        WHERE baiviet.ma_tloai = OLD.ma_tloai
    )
    WHERE theloai.ma_tloai = OLD.ma_tloai;
END //

DELIMITER ;
--
DELIMITER //

CREATE TRIGGER tg_CapNhatTheLoai_AfterInsertUpdate
AFTER INSERT ON baiviet
FOR EACH ROW
BEGIN
    UPDATE theloai
    SET SLBaiViet = (
        SELECT COUNT(*)
        FROM baiviet
        WHERE baiviet.ma_tloai = NEW.ma_tloai
    )
    WHERE theloai.ma_tloai = NEW.ma_tloai;
END //

CREATE TRIGGER tg_CapNhatTheLoai_AfterUpdate
AFTER UPDATE ON baiviet
FOR EACH ROW
BEGIN
    IF OLD.ma_tloai != NEW.ma_tloai THEN
        UPDATE theloai
        SET SLBaiViet = (
            SELECT COUNT(*)
            FROM baiviet
            WHERE baiviet.ma_tloai = OLD.ma_tloai
        )
        WHERE theloai.ma_tloai = OLD.ma_tloai;
    END IF;

    UPDATE theloai
    SET SLBaiViet = (
        SELECT COUNT(*)
        FROM baiviet
        WHERE baiviet.ma_tloai = NEW.ma_tloai
    )
    WHERE theloai.ma_tloai = NEW.ma_tloai;
END //

DELIMITER ;

--l

CREATE TABLE Users(
	username varchar(100) not null primary key,
	password varchar(25) not null,
	role varchar(10) not null
)
