from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class washing_machine_session(Base):
	__tablename__ = 'tariff_scheme_individual'
	id = Column(Integer, primary_key=True)
	WashID = Column(Text)
	Time = Column(Text)
	EST = Column(Text)
	LET = Column(Text)
	AST = Column(Text)
	AET = Column(Text)
	Pgm = Column(Text)
	PriceListID = Column(Text)
	SwID = Column(Text)
	startPoint = Column(Text)
	endPoint = Column(Text)
	pathTofile = Column(Text)
