from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class heating_cooling_session(Base):
	__tablename__ = 'heating_cooling_session'
	id = Column(Integer, primary_key=True)
	HCID = Column(Text)
	SwID = Column(Text)
	Time = Column(Text)
	SetPt = Column(Text)
	AllowedDev = Column(Text)
	AST = Column(Text)
	AET = Column(Text)
	startPoint = Column(Text)
	endPoint = Column(Text)
	pathTofile = Column(Text)

