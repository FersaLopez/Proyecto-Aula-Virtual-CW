
/*Esto es para el calendario*/

INSERT INTO TIPO_EVENT VALUES
            (1, 1, 'UNAM General', 'Eventos generales de la UNAM'), 
            (0, 1, 'ENP CicloE','Eventos de la ENP6 y sus fechas administrativas relacionadas con el ciclo indicado'),
            (0, 1, 'Eventos_ENP', 'Eventos especiales de la ENP6, como concursos, premios, ferias, etcétera'), 
            (0, 1, 'Eventos cultYsoc', 'Eventos culturales y sociales de la comunidad estudiantil'),
            (0, 1, 'Días festivos', 'Días nacional y mundialmente festivos'), 
            (0, 2, 'Evento_Asign', 'Eventos relacionados a una asignación'),
            (0, 2, 'Clase_Aula','Horario de clase de un aula'),
            (0, 2, 'Recordatorio', 'Recordatorios personalizados por el usuario en su sección: Calendario Privado Único');

INSERT INTO MES VALUES
            (1, 'Enero'),
            (0, 'Febrero'),
            (0, 'Marzo'),
            (0, 'Abril'),
            (0, 'Mayo'),
            (0, 'Junio'),
            (0, 'Julio'),
            (0, 'Agosto'),
            (0, 'Septiembre'),
            (0, 'Octubre'),
            (0, 'Noviembre'),
            (0, 'Diciembre');

INSERT INTO MES_FIN VALUES
            (1, 'Enero'),
            (0, 'Febrero'),
            (0, 'Marzo'),
            (0, 'Abril'),
            (0, 'Mayo'),
            (0, 'Junio'),
            (0, 'Julio'),
            (0, 'Agosto'),
            (0, 'Septiembre'),
            (0, 'Octubre'),
            (0, 'Noviembre'),
            (0, 'Diciembre');


INSERT INTO EVENTOS VALUES 
            (1, 1, NULL, 6, NULL, 9, NULL, '00:00:00', '23:59:59','22', NULL,  '1910-09-22 12:00:00', 'aniversario-UNAM', 'Aniversario de la UNAM', NULL),   
            (2, 1, NULL, 6, NULL, 2, NULL, '00:00:00', '23:59:59','11', NULL,  '1964-02-11 12:00:00', 'aniversario-p6', 'Aniversario del plantel No.6 Antonio Caso', NULL), 
            (3, 4, NULL, 7, NULL, 1, NULL, '00:00:00', '23:59:59','6', NULL,  '2022-01-06 12:00:00', 'pijama', 'Día de la pijama', NULL), 
            (4, 4, NULL, 7, NULL, 10, NULL, '00:00:00', '23:59:59','31', NULL,  '2022-10-31 12:00:00', 'disfraz', 'Día del disfraz', NULL), 
            (5, 5, NULL, 8, NULL, 5, NULL, '00:00:00', '23:59:59','15', NULL,  '1917-05-15 12:00:00', 'teacher', 'Día del maestro', NULL), 
            (6, 5, NULL, 8, NULL, 5, NULL, '00:00:00', '23:59:59','1', NULL,  '1886-05-01 12:00:00', 'trabajo', 'Día del trabajo', NULL), 
            (7, 5, NULL, 8, NULL, 2, NULL, '00:00:00', '23:59:59','5', NULL,  '1917-02-05 12:00:00', 'aniversario-constitucion', 'Aniversario de la Constitución Política de los Estados Unidos Mexicanos', NULL), 
            (8, 5, NULL, 8, NULL, 9, NULL, '00:00:00', '23:59:59','16', NULL,  '1810-09-16 12:00:00', 'aniversario-independencia', 'Aniversario de la Independencia de México', NULL), 
            (9, 5, NULL, 8, NULL, 11, NULL, '00:00:00', '23:59:59','20', NULL,  '1910-11-20 12:00:00', 'aniversario-rev-mexicana', 'Aniversario de la Revolución Mexicana', NULL), 
            (10, 5, NULL, 8, NULL, 1, NULL, '00:00:00', '23:59:59','1', NULL,  '2022-01-01 12:00:00', 'new-year', 'Año nuevo', NULL),
            (11, 5, NULL, 8, NULL, 3, NULL, '00:00:00', '23:59:59','21', NULL,  '1806-03-21 12:00:00', 'natalicio-Juarez', 'Aniversario del Natalicio de Benito Juárez', NULL), 
            (12, 5, NULL, 8, NULL, 5, NULL, '00:00:00', '23:59:59','23', NULL,  '1929-05-23 12:00:00', 'estudiante', 'Día del estudiante', NULL), 
            (13, 5, NULL, 8, NULL, 10, NULL, '00:00:00', '23:59:59','2', NULL,  '1968-10-02 12:00:00', 'masacre', 'Conmemoración de La Matanza de Tlatelolco', NULL);

INSERT INTO EVENTOS_RANG VALUES 
            (1, 2, NULL, 6, NULL, 8, 4, 1, '00:00:00', '23:59:59','9', NULL, '2021-08-09 07:00:00', '8', '2022-04-08', NULL, 'Ciclo escolar 2021-2022', NULL ), 
            (2, 3, NULL, 6, NULL, 4, 4, NULL, '00:00:00', '23:59:59','5', NULL, '2022-04-05 00:00:00', '7', '2022-04-07 23:59:59', NULL, 'MICAH', NULL ), 
            (3, 5, NULL, 8, NULL, 11, 11, NULL, '00:00:00', '23:59:59','1', NULL, '2022-11-01 00:00:00', '2', '2022-11-02', NULL, ' Día de muertos', NULL ), 
            (4, 1, NULL, 6, NULL, 1, 1, 1, '00:00:00', '23:59:59','10', NULL, '2021-01-10 00:00:00', '29', '2022-01-29', NULL, 'Inscripción a Concursos Interpreparatorianos', NULL ), 
            (5, 1, NULL, 6, NULL, 2, 2, 1, '00:00:00', '23:59:59','14', NULL, '2022-02-14 00:00:00', '18', '2022-02-18', NULL, 'Etapa local Concursos Interpreparatorianos', NULL ), 
            (6, 1, NULL, 6, NULL, 3, 3, 1, '00:00:00', '23:59:59','7', NULL, '2022-03-07 00:00:00', '11', '2022-03-11', NULL, 'Etapa final Concursos Interpreparatorianos', NULL ), 
            (7, 2, NULL, 6, NULL, 4, 5, 1, '00:00:00', '23:59:59','18', NULL, '2022-04-18 00:00:00', '3', '2022-05-03', NULL, 'Exámenes ordinarios', NULL ), 
            (8, 2, NULL, 6, NULL, 5, 5, 1, '00:00:00', '23:59:59','18', NULL, '2022-05-18 00:00:00', '25', '2022-05-25', NULL, 'Exámenes extraordinarios', NULL );
            
           
           
             
            
             
            
            
            
            
            
             
            
             
            
             
            
           
            
             
        
        