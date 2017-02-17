INSERT INTO `usuariosys` (`idUsuario`, `nomyap`, `usuario`, `contraseña`, `dni`, `telefono`, `direccion`, `email`, `idLocalidad`, `tipoUsuario`) VALUES 
('1', 'Pedro Lopez', 'plopez', 'plopez', '21112211', '03034561', 'Frondizi 500', 'plopez@gmail.com', '1', 'O'), 
('2', 'Lucas Vallejos', 'lvallejos', 'lvallejos', '33559988', '0303456', 'Arturo Illia 123', 'lvallejos@hotmail.com', '2', 'O'),
('3', 'Ana Medina', 'amedina', 'amedina', '12558878', '0303457', 'Monteagudo 23', 'amedina@hotmail.com', '3', 'A')


INSERT INTO `usuarioEscribano` (`idEscribano`, `nomyap`, `usuario`, `contraseña`, `dni`, `telefono`, `direccion`, `email`, `matricula`, `estadoAprobacion`, `idLocalidad`, `idUsuario`, `motivoRechazo`) VALUES 
('1', 'Andrea Moreno', 'amoreno', 'amoreno', '12457897', '0303456', 'Arbo y Blanco 550', 'amoreno@arnet.com.ar', '12345', NULL, '4', '1', NULL), 
('2', 'Fabricio Acosta', 'facosta', 'facosta', '15889966', '0303459', 'J. D. Perón 1445', 'facosta@google.com', '4587', NULL, '6', '2', NULL),
('3', 'Margarita Sosa', 'msosa', 'msosa', '13889966', '0303457', 'Av. Alvear 45', 'msosa@hotmail.com', '4587', NULL, '1', '2', NULL)


INSERT INTO `Minuta` (`idMinuta`, `idEscribano`, `idUsuario`, `fechaIngresoSys`, `fechaEdicion`) VALUES 
('1', '1', '1', '2016-11-01 00:00:00', NULL), 
('2', '2', '1', '2016-11-02 00:00:00', NULL),
('3', '1', '2', '2016-11-04 00:00:00', NULL),
('4', '1', '1', '2016-11-05 00:00:00', NULL), 
('5', '2', '1', '2016-11-06 00:00:00', NULL),
('6', '1', '2', '2016-11-07 00:00:00', NULL),
('7', '3', '1', '2017-01-01 00:00:00', NULL), 
('8', '3', '1', '2017-01-02 00:00:00', NULL),
('9', '3', '2', '2017-01-04 00:00:00', NULL),
('10', '3', '2', '2017-01-05 00:00:00', NULL)


INSERT INTO `Parcela` (`idParcela`, `idLocalidad`, `circunscripcion`, `seccion`, `chacra`, `quinta`, `fraccion`, `manzana`, `parcela`, `superficie`, `partida`, `tipoPropiedad`, `planoAprobado`, `fechaPlanoAprobado`, `descripcion`, `idMinuta`, `nroMatriculaRPI`, `fechaMatriculaRPI`, `tomo`, `folio`, `finca`, `año`) VALUES 
('1', '1', 'II', 'A', '20', '15', NULL, '2', '5', '200,00', '0', 'U', '20/115/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la parcela 6 y al NO calle Arturo Illia', '1', '123456', '2005-11-05', '1', '2', '6', '2005'),
('2', '1', 'II', 'A', '20', '15', NULL, '2', '6', '200,00', '0', 'U', '20/115/05', '2005-11-02', 'Linda por su frente NE con la parcela 7 , al SE con la parcela 8 y al NO calle Arturo Illia', '1', '123457', '2005-11-05', '1', '2', '6', '2005'),
('3', '1', 'I', 'C', '105', NULL, NULL, '21', '1', '300,00', '0', 'U', '20/075/12', '2012-01-22', 'Linda por su frente NE con la parcela 9 , al SE con la parcela 16 y al NO calle Remedios de Escalada', '2', '65448', '2012-05-27', '164', '42', '5', '2012'),
('4', '1', 'I', 'C', '105', NULL, NULL, '21', '2', '500,00', '0', 'U', '20/075/12', '2012-01-22', 'Linda por su frente NE con la parcela 10 , al SE con la parcela 15 y al NO calle Remedios de Escalada', '2', '65449', '2012-05-27', '164', '42', '5', '2012'),
('5', '3', 'XII', NULL, NULL, NULL, NULL, NULL, '105', '10.200,00', '2256', 'R', '15/605/00', '2000-07-15', 'Linda por su frente NE con la parcela 4 , al SE con la parcela 6 y al NO Ruta provincial N°4', '3', '2548', '2000-11-05', '1', '2', '6', '2000'),
('6', '3', 'XII', NULL, NULL, NULL, NULL, NULL, '106', '10.500,00', '2257', 'R', '15/305/00', '2000-07-15', 'Linda por su frente NE con la parcela 5 , al SE con la parcela 7 y al NO Ruta provincial N°4', '3', '2549', '2000-11-05', '1', '2', '6', '2000'),
('7', '3', 'XII', NULL, NULL, NULL, NULL, NULL, '107', '10.250,00', '2258', 'R', '15/305/00', '2000-07-15', 'Linda por su frente NE con la parcela 6 , al SE con la parcela 8 y al NO Ruta provincial N°4', '3', '2550', '2000-11-05', '1', '2', '6', '2000'),
('8', '1', 'I', 'A', '17', '14', NULL, '5A', '4', '200.00', '0', 'U', '20/115/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', '4', '1234', '2005-11-05', '1', '2', '6', '2005'),
('9', '10', 'II', 'A', '20', '1', NULL, '56', '5A', '200.00', '0', 'S', '20/117/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', '5', '1235', '2005-11-05', '1', '2', '6', '2005'),
('10', '1', 'I', 'A', '21', '108', NULL, '32', '7', '200.00', '0','S', '20/116/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', '6', '1236', '2005-11-05', '1', '2', '6', '2005'),
('11', '9', 'I', 'B', '7', '22', NULL, '12', '11', '200.00', '0', 'S', '20/118/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', '7', '1237', '2005-11-05', '1', '2', '6', '2005'),
('12', '1', 'II', 'C', '5', '14', NULL, '9', '12', '200.00', '0', 'U', '20/119/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', '8', '1238', '2005-11-05', '1', '2', '6', '2005'),
('13', '1', 'I', 'B', '12', '65', NULL, '5', '13', '200.00', '0', 'U', '20/120/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', '9', '1239', '2005-11-05', '1', '2', '6', '2005'),
('14', '1', 'II', 'A', '14', '12', NULL, '21', '14', '200.00', '0', 'U', '20/121/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', '10', '1230', '2005-11-05', '1', '2', '6', '2005')

INSERT INTO `Propietario` (`idPropietario`, `idParcela`, `titular`, `dni`, `direccion`, `idLocalidad`, `cuitCuil`, `conyuge`, `fechaEscritura`, `porcentajeCondominio`, `nroUfUc`, `tipoUfUc`, `planoAprobado`, `fechaPlanoAprobado`, `porcentajeUfUc`, `poligonos`) VALUES 
('1','1', 'Roberto Acosta', '31567894', 'Julio A. Roca 123', '1', NULL, NULL, '2006-11-05', '100', NULL, NULL, NULL, NULL, NULL, NULL),
('2','2', 'Andrea Acosta', '33009947', 'Julio A. Roca 123', '1', NULL, NULL, '2006-11-05', '100', NULL, NULL, NULL, NULL, NULL, NULL),
('3','3', 'Raul Oviedo', '24555678', 'Liniers 55', '1', NULL, NULL, '2006-11-05', '50', NULL, NULL, NULL, NULL, NULL, NULL),
('4','3', 'Maria Oviedo', '28679578', 'Liniers 55', '1', NULL, NULL, '2006-11-05', '50', NULL, NULL, NULL, NULL, NULL, NULL),
('5','4', 'Raul Oviedo', '24555678', 'Liniers 55', '1', NULL, NULL, '2006-11-05', '50', NULL, NULL, NULL, NULL, NULL, NULL),
('6','4', 'Maria Oviedo', '28679578', 'Liniers 55', '1', NULL, NULL, '2006-11-05', '50', NULL, NULL, NULL, NULL, NULL, NULL),
('7','5', 'Cooperativa Agricola Unión S.R.L.', NULL, 'Mendoza', '6', '30457898751', NULL, '2006-11-05', '100', NULL, NULL, NULL, NULL, NULL, NULL),
('8','6', 'Cooperativa Agricola Unión S.R.L.', NULL, 'Mendoza', '6', '30457898751', NULL, '2006-11-05', '100', NULL, NULL, NULL, NULL, NULL, NULL),
('9','7', 'Cooperativa Agricola Unión S.R.L.', NULL, 'Mendoza', '6', '30457898751', NULL, '2006-11-05', '100', NULL, NULL, NULL, NULL, NULL, NULL),
('10','8', 'Andrea Alcaraz', '33939556', 'Mariano Moreno 550', '1', NULL, NULL, '2006-11-05', '50', '1', 'F', '20/054/12', '2016-10-08', '33,33', '00-01'),
('11','8', 'Rodrigo Alcaraz', '33939557', 'Mariano Moreno 550', '1', NULL, NULL, '2006-11-05', '50', '1', 'F', '20/054/12', '2016-10-08', '33,33', '00-01'),
('12','9', 'Analia Fernandez', '12554789', 'Rivadavia 445', '1', NULL, 'Pedro Muñoz', '2006-11-05', '50',  NULL, NULL, NULL, NULL, NULL, NULL),
('13','9', 'Marina Muñoz', '34558798', 'Rivadavia 445', '1', NULL, NULL, '2006-11-05', '25',  NULL, NULL, NULL, NULL, NULL, NULL),
('14','9', 'Marisel Muñoz', '25887746', 'Rivadavia 445', '1', NULL, NULL, '2006-11-05', '25',  NULL, NULL, NULL, NULL, NULL, NULL),
('15','10', 'Maria Andrea Romero', '33939556', 'Mariano Moreno 550', '1', NULL, NULL, '2006-11-05', '100',NULL, NULL, NULL, NULL, NULL, NULL),
('16','11', 'Nelson Andres Luque', '24556789', 'Av. Sarmiento 5447', '1', NULL, NULL, '2006-11-05', '50', '21', 'F', '20/006/14', '2013-10-08', '50', '00-02'),
('17','11', 'Mariela Elizabeth Luque', '24568791', 'Av. Sarmiento 5447', '1', NULL, NULL, '2006-11-05', '50', '2', 'F', '20/006/14', '2013-10-08', '50', '00-02'),
('18','12', 'Analia Mendoza', '18554789', 'Roque Saenz Peña 445', '1', NULL, 'Pedro Lopez', '2006-11-05', '100',  NULL, NULL, NULL, NULL, NULL, NULL),
('19','13', 'Mario Leiva', '45887964', 'Cervantes 54', '1', NULL, NULL, '2006-11-05', '50',  NULL, NULL, NULL, NULL, NULL, NULL),
('20','13', 'Federico Leiva', '45879687', 'Cervantes 54', '1', NULL, NULL, '2006-11-05', '50',  NULL, NULL, NULL, NULL, NULL, NULL),
('21','14', 'Marisel Muñoz', '25887746', 'Rivadavia 445', '1', NULL, NULL, '2006-11-05', '100',  NULL, NULL, NULL, NULL, NULL, NULL)

INSERT INTO `EstadoMinuta` (`idEstadoMinuta`, `idMinuta`, `estadoMinuta`, `motivoRechazo`, `fechaEstado`, `idUsuario`) VALUES 
('1', '7', 'R', 'La unidad Funcional "21 F" no Existe en el Plano indicado.', '2016-11-11 00:00:00', '2'), 
('2', '1', 'A', NULL, '2017-01-01 00:00:00', '1'),
('3', '2', 'A', NULL, '2017-01-01 00:00:00', '2'), 
('4', '3', 'A', NULL, '2017-01-01 00:00:00', '1'),
('5', '7', 'A', NULL, '2017-01-01 00:00:00', '2'), 
('6', '4', 'A', NULL, '2017-01-01 00:00:00', '1'),
('7', '5', 'R', 'Verificar Nomenclatura Catastral', '2016-11-11 00:00:00', '2'), 
('8', '6', 'R', 'Verificar Número de Plano Aprobado', '2017-01-01 00:00:00', '1'),
('9', '5', 'A', NULL, '2017-01-01 00:00:00', '2'), 
('10', '6', 'A', NULL, '2017-01-01 00:00:00', '1'),
('11', '8', 'P', NULL, NULL, NULL), 
('12', '9', 'P', NULL, NULL, NULL),
('13', '10', 'P', NULL, NULL, NULL)

INSERT INTO `Pedidos` (`idPedido`, `idEscribano`, `descripcion`, `fechaPedido`, `estadoPedido`, `rtaPedido`, `fechaRta`, `idUsuario`) VALUES 
('1', '3', 'Prueba solicitud consulta 1', '2016-11-15 00:00:00', 'C', 'Prueba respuesta consulta 1', '2017-01-01 00:00:00', '2'), 
('2', '1', 'Prueba solicitud consulta 2', '2016-12-05 00:00:00', 'P', NULL, NULL, NULL)