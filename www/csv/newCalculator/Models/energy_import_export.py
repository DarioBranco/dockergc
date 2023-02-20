from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class energy_import_export(Base):
	__tablename__ = 'energy_import_export'
	id = Column(Integer, primary_key=True)
	MeterID = Column(Text)
	Time = Column(Text)
	SwID = Column(Text)
	startPoint = Column(Text)
	endPoint = Column(Text)
	pathTofile = Column(Text)
