git clone https://github.com/pvl1175/thrift-interface-definitions
mkdir api
thrift -gen php -out .\ .\thrift-interface-definitions\lookfor9.thrift
